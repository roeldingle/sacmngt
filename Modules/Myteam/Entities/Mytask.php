<?php

namespace Modules\Myteam\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Mytask extends Model
{

	protected $dates = ['start_at', 'end_at'];

    public function user()
    {
    	return $this->belongsTo('Modules\User\Entities\User', 'assign_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
