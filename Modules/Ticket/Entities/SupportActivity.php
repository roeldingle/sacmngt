<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

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
    	return $this->belongsTo('Modules\Ticket\Entities\Ticket', 'support_activity', 'id', 'ticket_id' );
    }

    public function user()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'support_activity', 'id', 'user_id' );
    }

    

    

}
