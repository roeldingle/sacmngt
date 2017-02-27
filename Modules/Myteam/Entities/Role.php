<?php

namespace Modules\Myteam\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Myteam extends Model
{

   

    public function user()
    {
    	return $this->hasMany('Modules\User\Entities\User');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
