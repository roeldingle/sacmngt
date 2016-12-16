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
	protected $fillable = ['role_id','username', 'email', 'password','is_active'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	/*
		Users meta relationship
	*/
	public function meta(){
        return $this->hasMany('Modules\User\Entities\Meta');
    }

    /*
		Users role
	*/
	public function role(){
        return $this->belongsTo('Modules\Role\Entities\Role');
    }

    /*
        Users role
    */
    public function department(){
        return $this->belongsTo('Modules\Ticket\Entities\Department');
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
	public static function saveUser($input){

		$default_password = 'secret';

	 	$user = new User();
        $user->role_id = $input['role_id'];
        $user->department_id = $input['department_id'];
        $user->email = $input['email'];
        $user->password = isset($input['password']) ? bcrypt($input['password']) : bcrypt($default_password);
        $user->is_active = true;
        $user->save();

        /*unset user table keys*/
        $removeKeys = array('_token','role_id', 'email', 'password','password_confirmation');
		foreach($removeKeys as $key) {
		   unset($input[$key]);
		}

		//Check if user was created
        if ( ! $user->id)
        {
            App::abort(500, 'Some Error');
        }

		foreach($input as $key=>$value) {
			$meta = new Meta;
	        $meta->user_id = $user->id;
	        $meta->key = $key;
	        $meta->value = $value;
	        $meta->save();
		}
        
        return $user;
    }


    public static function editUser($input, $user){

        $user->role_id = $input['role_id'];
        $user->department_id = $input['department_id'];
        $user->email = $input['email'];
        $user->is_active = true;
        $userSaved = $user->save();


        /*unset user table keys*/
        $removeKeys = array('_token','role_id', 'email');
        foreach($removeKeys as $key) {
           unset($input[$key]);
        }


        foreach($input as $key=>$value) {
            $meta = $user->meta()
                ->where('key', $key)
                ->first() ?: new Meta(['key' => $key]);
            
            $meta->user_id = $user->id;
            $meta->key = $key;
            $meta->value = $value;
            $metaSaved = $meta->save();
        }
        
        
        if($userSaved && $metaSaved){
            return $user;
        }else{
            return false;
        }
        
    }




    /*
		function to set/get user meta
	*/
    public function setMeta(){

    	$user = User::findOrFail($this->id);
        foreach($user->meta as $meta) {
            $user->setAttribute($meta->key ,$meta->value);
        }

        $user->avatar = ($user->avatar !== null) ? $user->avatar : 'http://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg';

        return $user;
    }

     /*
		function to get user serach
	*/
    public static function getUserSearch($request){

    	$per_page = config('app.default_table_limit');

    	/*default value*/
    	$users = User::active()->paginate($per_page);

    	/*check if there are serach parameter*/
        if ($request->input('search_param') !== "all" && $request->has('search_param') && $request->has('search')) {

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $meta_array = array('fname','lname');

            if(in_array($search['search_param'], $meta_array)){

                $users = User::active()->with('meta')
                ->whereHas('meta', function ($query) use ($search) {
                    $query->where('meta_user.key', $search['search_param']);
                    $query->where('meta_user.value','LIKE', '%'.$search['search'].'%');
                })
                ->paginate($per_page);

            }else{
                $users = User::active()->where($search['search_param'], 'LIKE', '%'.$search['search'].'%')->paginate($per_page);
            }

        }


        /*all*/
        if ($request->input('search_param') == "all"){

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $users = User::active()->with('meta')
            ->whereHas('meta', function ($query) use ($search) {
                $query->where('users.email','LIKE', '%'.$search['search'].'%');
                $query->orWhere('meta_user.value','LIKE', '%'.$search['search'].'%');
            })
            ->paginate($per_page);
        }

        return $users;
    }


}
