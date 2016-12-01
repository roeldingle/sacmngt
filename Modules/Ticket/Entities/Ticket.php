<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;
use Modules\Ticket\Entities\Priority;

class Ticket extends Model
{
    protected $fillable = ['user_id','department_id','priority_level','subject', 'message', 'status', 'is_active'];


    /**
     * Always capitalize the first name when we save it to the database
     */
    public function setCodeAttribute($array) {
        $this->attributes['code'] = (strtoupper($array['prefix']."-".substr(md5($array['value']), 0, 8))."-".date('mdy'));
    }


    public function user()
    {
    	return $this->belongsTo('Modules\User\Entities\User');
    }

    public function priority()
    {
    	return $this->hasOne('Modules\Ticket\Entities\Priority', 'id', 'priority_id' );
    }

    public function status()
    {
    	return $this->hasOne('Modules\Ticket\Entities\Status', 'id', 'status_id' );
    }

    public function department()
    {
        return $this->hasOne('Modules\Ticket\Entities\Department', 'id', 'department_id' );
    }

    public function replies()
    {
        return $this->hasMany('Modules\Ticket\Entities\Reply', 'ticket_id');
    }

    public function attachments()
    {
        return $this->hasMany('Modules\Ticket\Entities\Attachment', 'ticket_id');
    }

    public function scopeActive($query)
    {
        return $query
        ->where('is_active', 1);
    }

}
