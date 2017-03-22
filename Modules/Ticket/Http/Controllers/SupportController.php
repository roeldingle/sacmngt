<?php


namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Entities\Department;
use Modules\Ticket\Entities\Priority;
use Modules\Ticket\Entities\Attachment;
use Modules\Ticket\Entities\SupportActivity;
use Validator;
use Log;

class SupportController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request){

        $tickets = Ticket::active()
        ->where('department_id',$request->department->id)
        ->paginate(config('app.default_table_limit'));


        return view('ticket::index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('tickets',$tickets);
    }

    public function show(Request $request, $code){

        $ticket = $request->department->ticket->where('code',$code)->first();

        /*if updated store in support activity*/
        if($ticket){

            $activity = SupportActivity::where('ticket_id',$ticket->id)
            ->where('status_id', 1)
            ->first();

            if($activity == null){
                $activity = new SupportActivity;
                $activity->ticket_id = $ticket->id;
                $activity->user_id = Auth::user()->id;
                $activity->status_id = 1;
                $activity->save();
            }
            
        }

        return view('ticket::show')
        ->with('ticket', $ticket);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(){
        return view('ticket::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request){

       $validator = Validator::make($request->all(), [
           // 'priority_id' => 'required',
            'subject' => 'required|min:2',
            'message' => 'required|min:2',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('support.create')
                ->withErrors($validator);
        }

        $ticket = Ticket::saveTicket($request);

        if($ticket){
            return redirect()
            ->route('support.edit', ['code' => $ticket->code])
            ->with('info','New Ticket created successfully!')
            ->with('alert', 'alert-success');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request, $code){

      $ticket = $request->department->ticket->where('code',$code)->first();

        return view('ticket::edit')
        ->with('ticket', $ticket);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $code){

        $validator = Validator::make($request->all(), [
            //'priority_id' => 'required',
            'subject' => 'required|min:2',
            'message' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('support.edit',['code' => $ticket->code])
                ->withErrors($validator);
        }
        
        $ticket = Ticket::saveTicket($request, $code);

        if($ticket){
            return redirect()
            ->route('support.edit',['code' => $ticket->code])
            ->with('info','Ticket has been updated!')
            ->with('alert', 'alert-success');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request){

       $values = array('status_id'=> 0);
       
       $affectedRows = Ticket::whereIn('id',$request->id)->update($values);

        \Session::flash('info','Ticket has been deleted!');
        \Session::flash('alert', 'alert-danger');

        $return = [
            'affectedRows' => $affectedRows,
            'redirect' => $request->return_route
        ];

        return $return;
        
    }

    public function ajaxUpdateStatus(Request $request){

        $values = array('status_id'=> $request->status, 'staff_filed' => Auth::user()->id);
        $updated = Ticket::findOrFail($request->id)->update($values);

        /*if updated store in support activity*/
        if($updated){

        $activity = new SupportActivity;
        $activity->ticket_id = $request->id;
        $activity->user_id = Auth::user()->id;
        $activity->status_id = $request->status;
        $activity->save();

        }

        \Session::flash('info','Ticket status has been changed!');
        \Session::flash('alert', 'alert-success');

        $return = [
            'updated' => $updated,
            'redirect' => $request->return_route
        ];

        return $return;

    }


}