<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class TicketCategory extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ticket_category';

    protected $fillable = ['department_id','name', 'description','severity_level'];

    public function department()
    {
        return $this->belongsTo('Modules\User\Entities\Department', 'support_category', 'id', 'department_id' );
    }

    
     public function scopeActive($query)
    {
        return $query
        ->where('is_active', 1);
    }
    

}
