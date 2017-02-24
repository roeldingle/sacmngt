<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;


class Team extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teams';

    protected $fillable = ['department_id','name','description','leader_id', 'is_active'];

    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo('Modules\Department\Entities\Department');
    }

    public function leader()
    {
        return $this->hasOne('Modules\User\Entities\User', 'id', 'leader_id');
    }

    public function members()
    {
    	return $this->hasMany('Modules\User\Entities\User', 'team_id')->orderBy('job_id','DESC');
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
