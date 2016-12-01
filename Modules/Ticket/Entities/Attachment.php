<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;


class Attachment extends Model
{
    protected $fillable = ['ticket_id','type','path'];


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
