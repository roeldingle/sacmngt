<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Priority extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ticket_priority';

    protected $fillable = ['name','description','label_class', 'is_active'];

    public $timestamps = false;

    public function user()
    {
    	return $this->hasMany('Modules\User\Entities\User');
    }

    public function ticket()
    {
    	return $this->belongsToMany('Modules\Ticket\Entities\Ticket', 'ticket_priority', 'id', 'priority_id' );
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
