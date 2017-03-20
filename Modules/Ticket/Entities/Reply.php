<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;
use Modules\Ticket\Entities\Priority;

class Reply extends Model
{
    protected $fillable = ['user_id','ticket_id','message', 'is_active'];



    public function user()
    {
    	return $this->belongsTo('Modules\User\Entities\User');
    }


    public function ticket()
    {
    	return $this->hasOne('Modules\Ticket\Entities\Ticket', 'id', 'ticket_id' );
    }


    public function scopeActive($query)
    {
        return $query
        ->where('is_active', 1);
    }

}
