<?php

namespace Modules\User\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Modules\User\Entities\Meta;


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
	public function meta()
    {
        return Meta::where('user_id', '=', $this->id)->get();
    }

    /*
		Users role
	*/
	public function role()
    {
        return $this->belongsTo('Modules\Role\Entities\Role');
    }

    /*
		Users active
	*/
	public function scopeActive($query)
    {
        return $query->where('is_active','=', 1);
    }


	public static function saveUser($input){

	 	$user = new User();
        $user->role_id = $input['role_id'];
        $user->email = $input['email'];
        $user->password = $input['password'] !== null ? bcrypt($input['password']) : bcrypt($input['password']);
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

        
        //User was created show OK message
        return true;
    }


    public function getUserMeta(){

    	$user = User::findOrFail($this->id);
        foreach($user->meta() as $meta) {
            $user->setAttribute($meta->key ,$meta->value);
        }
        return $user;
    }


}
