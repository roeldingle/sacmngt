<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;
use Modules\User\Entities\Department;
use Modules\Ticket\Entities\Ticket;

class SupportActivity extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'support_activity';

    protected $fillable = ['ticket_id','user_id', 'status_id'];


    public function ticket()
    {
    	return $this->belongsTo('Modules\Ticket\Entities\Ticket');
    }

    public function user()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'support_activity', 'id', 'user_id' );
    }


    public function userCountRelation()
    {
        //We use "hasOne" instead of "hasMany" because we only want to return one row.
        return $this->hasOne('User')->select(DB::raw('user_id, count(*) as count'))->groupBy('user_id');
    }

    //This is got via a magic method whenever you call $this->likeCount (built into Eloquent by default)
    public function getUserCountAttribute()
    {
        return $this->userCountRelation->count;
    }

    

    

}
