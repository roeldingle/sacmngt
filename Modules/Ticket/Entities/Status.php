<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Status extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ticket_status';

    protected $fillable = ['name','description', 'is_active'];

    public $timestamps = false;


    public function ticket()
    {
    	return $this->belongsToMany('Modules\Ticket\Entities\Ticket', 'ticket_status', 'id', 'status_id' );
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
