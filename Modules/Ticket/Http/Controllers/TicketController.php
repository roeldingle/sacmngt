<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Entities\Department;
use Modules\Ticket\Entities\Priority;
use Module;
use Validator;
use View;

class TicketController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

        $per_page = config('app.default_table_limit');
        $tickets = Auth::user()->ticket()->active()
        ->where('department_id',$request->department->id)
        ->paginate($per_page);

        return view('ticket::index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('tickets',$tickets);
    }

    public function show(Request $request, $code){

        $ticket = $request->department->ticket->where('code',$code)->first();

        return view('ticket::show')
        ->with('ticket', $ticket);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ticket::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'priority_id' => 'required',
            'subject' => 'required|min:2',
            'message' => 'required|min:2',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('ticket.create')
                ->withErrors($validator);
        }


        $ticket = new Ticket();
        $ticket->code = time();
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
            ->route('ticket.edit', ['code' => $ticket->code])
            ->with('info','New Ticket created successfully!')
            ->with('alert', 'alert-success');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request, $code)
    {

      $ticket = $request->department->ticket->where('code',$code)->first();

        return view('ticket::edit')
        ->with('ticket', $ticket);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id){

        $ticket = Ticket::findOrFail($id);

         $validator = Validator::make($request->all(), [
            'priority_id' => 'required',
            'subject' => 'required|min:2',
            'message' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('ticket.edit',['id' => $ticket->id])
                ->withErrors($validator);
        }

        $ticket->code = time();
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
