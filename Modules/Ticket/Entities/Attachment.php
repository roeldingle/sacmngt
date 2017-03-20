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


     /*
        display attachement preview
    */
    public function displayAttachmentPreview(){


        $filename = explode('.',$this->name);

        $extension = (isset($filename[1])) ? strtolower($filename[1]) : 'txt';

        $image_extensions = ['jpg','png','gif', 'jpeg'];
        $worddoc_extensions = ['doc','docx'];
        $pdf_extensions = ['pdf'];

        /*check if image*/
        if(in_array($extension, $image_extensions)){
            $preview = '<i class="fa fa-file-image-o fa-3" aria-hidden="true"></i>';
        }else if(in_array($extension, $worddoc_extensions)){
            $preview = '<i class="fa fa-file-word-o fa-3" aria-hidden="true"></i>';
        }else if(in_array($extension, $pdf_extensions)){
            $preview = '<i class="fa fa-file-pdf-o fa-3" aria-hidden="true"></i>';
        }else{
            $preview = '<i class="fa fa-file-o fa-3" aria-hidden="true"></i>';
        }

        return $preview;
    }
}
