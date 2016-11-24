<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Role extends Model
{
    protected $fillable = ['name','description'];

    public function user()
    {
    	return $this->hasMany('Modules\User\Entities\User');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
