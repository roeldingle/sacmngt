<?php

namespace Modules\Department\Entities;

use Illuminate\Database\Eloquent\Model;


class Department extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

    protected $fillable = ['name','description', 'is_active'];

    public $timestamps = false;

    public function user()
    {
    	return $this->hasMany('Modules\User\Entities\User');
    }

    public function ticket()
    {
    	return $this->hasMany('Modules\Ticket\Entities\Ticket', 'department_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
