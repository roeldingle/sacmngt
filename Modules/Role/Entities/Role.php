<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Role extends Model
{
    protected $fillable = [];

    public function user()
    {
    	return $this->hasMany('Modules\User\Entities\User');
    }
}
