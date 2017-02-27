<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Profile extends Model
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
