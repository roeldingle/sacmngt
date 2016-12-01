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
use Validator;

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

       $department_segment = $request->segment('2');

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

        /*set data to insert*/
        $ticket = new Ticket();
        $ticket->code = ['prefix' => $department_segment, 'value' => time()];
        $ticket->department_id = $request->department->id;
        $ticket->priority_id = $request->input('priority_id');
        $ticket->user_id = Auth::user()->id;
        $ticket->subject = $request->input('subject');
        $ticket->message = $request->input('message');
        $ticket->status_id = 1;
        $ticket->is_active = true;
        $ticket->save();

        /*upload and attach files if ther is any*/
        if($request->hasFile('fileupload') && $request->file('fileupload')[0] != ''){
            foreach($request->file('fileupload') as $file) {
                $filename = ($department_segment.'-'.md5(time())).'-'.$file->getClientOriginalName();
                $path = base_path().'/public/uploads/';
                $file->move($path, $filename);

                /*insert attachment data*/
                $attachment = new Attachment;
                $attachment->ticket_id = $ticket->id;
                $attachment->type = $file->getClientOriginalName();
                $attachment->path = $file->getPathname();
                $attachment->save();

            }
        }


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


    /**
     *  Store Files
     *
     * @return Redirect
     */
    public function _storeFiles($prefix,$files)
    {


      //If the array is not empty
      if ($files[0] != '') {
        foreach($files as $file) {
          // Set the destination path
          $destinationPath = 'uploads';
          // Get the orginal filname or create the filename of your choice
          $filename = ($prefix.'-'.md5(time())).'-'.$file->getClientOriginalName();
          // Copy the file in our upload folder
          $uploaded = $file->move($destinationPath, $filename);
        }
      }
      // Retrun a redirection or a view 
      return $files;
    }


}
