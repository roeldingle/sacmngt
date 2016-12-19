<?php

namespace Modules\Ticket\Entities;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;
use Modules\Ticket\Entities\Priority;

use Auth;

class Ticket extends Model
{
    protected $fillable = ['user_id','department_id','priority_level', 'status_id', 'subject', 'message', 'is_active'];

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

    public function attendedBy()
    {
        $staff_id = $this->staff_filed;
        $staff = User::find($staff_id);

        if($staff !== null){
            $staff = $staff->setMeta();
            $return = $staff->fname ." ".$staff->lname;
        }else{
            $return = '----';
        }

        return $return;
    }



    /****************************************************************/

    /*
        save tickets and attachments
    */
    public static function saveTicket($request, $code = NULL){

        /*set data to insert*/
        if($code == NULL){
            $ticket = new Ticket();
            $ticket->code = ['prefix' => $request->segment('2'), 'value' => time()];
        }else{
            $ticket = Ticket::active()->where('code', $code)->first();
        }
        
        $ticket->department_id = $request->department->id;
        $ticket->priority_id = $request->input('priority_id');
        $ticket->user_id = ($request->input('user_id') !== null) ? $request->input('user_id') : Auth::user()->id;
        $ticket->subject = $request->input('subject');
        $ticket->message = $request->input('message');
        $ticket->status_id = 1;

        /*will check if not ordinary user*/
        if(Auth::user()->role->id != 4){
            /*save staff/admin that creted ticket (usually for unfiled tickets) */
            $ticket->staff_filed = Auth::user()->id;
        }

        $ticket->is_active = true;
        $ticket->save();


        /*upload and attach files if there is any*/
        self::attachmentUpload($ticket, $request);

        return $ticket;

    }

    /*
        upload attachments
    */
    public static function attachmentUpload($ticket, $request){

        if($request->hasFile('fileupload') && $request->file('fileupload')[0] != ''){
            foreach($request->file('fileupload') as $file) {
                $filename = ($request->segment('2').'-'.md5(time())).'-'.$file->getClientOriginalName();
                $foldername = date('mdy');

                $base_path = base_path().'/public/';
                $path = 'uploads/ticket/'.$request->segment('2').'/'.$foldername.'/';
                $file->move($base_path.$path, $filename);

                /*insert attachment data*/
                $attachment = new Attachment;
                $attachment->ticket_id = $ticket->id;
                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path.$filename;
                $attachment->save();

            }

        }

    }


   

}
