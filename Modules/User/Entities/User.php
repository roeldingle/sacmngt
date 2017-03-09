<?php

namespace Modules\User\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

use Modules\User\Entities\Meta;
use Module;
use Config;

class User extends Authenticatable
{
    use Notifiable;


    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['role_id','emp_id','department_id', 'email', 'password','is_active'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /*
        Users ticket
    */
    public function task(){
        return $this->hasMany('Modules\Myteam\Entities\Mytask', 'assign_id');
    }

	/*
		Users meta relationship
	*/
	public function meta(){
        return $this->hasOne('Modules\User\Entities\Meta');
    }

    /*
		Users role
	*/
	public function role(){
        return $this->belongsTo('Modules\Role\Entities\Role');
    }

    /*
        Users department
    */
    public function department(){
        return $this->belongsTo('Modules\Department\Entities\Department');
    }


    /*
        Users ticket
    */
    public function ticket(){
        return $this->hasMany('Modules\Ticket\Entities\Ticket', 'user_id');
    }

    /*
		get active users
	*/
    public function scopeActive($query){
        return $query->where('is_active', 1);
    }


    /*
		function to save users and there meta
	*/
	public static function saveUser($input, $user = null){

		$default_password = 'password';

	 	$user = ($user != null) ? $user : new User();
        $user->role_id = $input['role_id'];
        $user->emp_id = $input['emp_id'];
        $user->department_id = $input['department_id'];
        $user->email = $input['email'];
        /*set password for default plus emp_id*/
        $user->password = isset($input['password']) ? bcrypt($input['password']) : bcrypt($default_password.$user->emp_id);
        $user->is_active = true;
        $user->save();
        

        /*unset array values of input for Meta table*/
        $removeKeys = array('_token','role_id','emp_id','department_id', 'email', 'password','password_confirmation');
        foreach($removeKeys as $key) {
           unset($input[$key]);
        }

        /*save user meta*/
        $input['user_id'] = $user->id;

        if($user != null && count($user->meta) > 0){
            $user->meta()->update($input);
        }else{
            $meta = new Meta($input);
            $user->meta()->save($meta);
        }
        
		//Check if user was created
        if ( ! $user->id)
        {
            App::abort(500, 'Some Error');
        }

        return $user;
    }



    /**/
    public function getAvatar(){
        return (isset($this) && isset($this->meta) && $this->meta->avatar != '') 
        ? $this->meta->avatar 
        : 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg';
    }


     /*
		function to get user serach
	*/
    public static function getUserSearch($request){

    	$per_page = config('app.default_table_limit');

    	/*default value*/
    	$users = User::active()->orderBy('created_at','DESC')->paginate($per_page);

    	/*check if there are serach parameter*/
        if ($request->input('search_param') !== "" && $request->has('search_param') && $request->has('search')) {

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $users = User::active()->whereHas('meta', function ($query) use ($search) {
                 $query->where($search['search_param'],'LIKE','%'.$search['search'].'%');
            })->paginate($per_page);

        }


        return $users;
    }


}
