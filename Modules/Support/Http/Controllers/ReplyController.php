<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Entities\Reply;
use Module;
use Validator;


class ReplyController extends Controller
{
    
   

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'reply_message' => 'required|min:2',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $department_segment = $request->segment('2');

        $reply = new Reply();
        $reply->user_id = Auth::user()->id;
        $reply->ticket_id = $request->input('ticket_id');
        $reply->message = $request->input('reply_message');
        $reply->is_active = true;
        $reply->save();


        if($reply){
            return redirect()->back()
            ->with('info','New Reply created successfully!')
            ->with('alert', 'alert-success');
        }
    }


    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $code){

        $ticket = Ticket::active()->where('code', $code)->first();

        $validator = Validator::make($request->all(), [
            'priority_id' => 'required',
            'subject' => 'required|min:2',
            'message' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('ticket.edit',['code' => $ticket->code])
                ->withErrors($validator);
        }

        
        $ticket->department_id = $request->department->id;
        $ticket->priority_id = $request->input('priority_id');
        $ticket->user_id = Auth::user()->id;
        $ticket->subject = $request->input('subject');
        $ticket->message = $request->input('message');
        $ticket->status_id = 1;
        $ticket->is_active = true;
        $ticket->save();

        
        if($ticket){
            return redirect()
            ->route('ticket.edit',['code' => $ticket->code])
            ->with('info','Ticket has been updated!')
            ->with('alert', 'alert-success');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request){

       $values = array('is_active'=> 0);
       
       $affectedRows = Ticket::whereIn('id',$request->id)->update($values);

        \Session::flash('info','Ticket has been deleted!');
        \Session::flash('alert', 'alert-danger');

        $return = [
            'affectedRows' => $affectedRows,
            'redirect' => $request->return_route
        ];

        return $return;
        
    }


}
