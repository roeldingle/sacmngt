<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Ticket\Entities\Ticket;
use Modules\User\Entities\Department;
use Modules\Ticket\Entities\Priority;
use Modules\Ticket\Entities\Attachment;
use Modules\Ticket\Entities\SupportActivity;
use Validator;
use Log;

class SupportDashboardController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request){

        $tickets = Ticket::active()->get();
        //self::getResponseTime();

		//$activities = SupportActivity::all();
		// $total_ticket_count = $ticket->count();
		//$total_ticket_count = $ticket->count();
		//dd($total_ticket_count);
		//$activities = SupportActivity::with('userCountRelation')->find($id);
		//echo $comment->likeCount;
		// dd($activities->);

        return view('ticket::support-dashboard')
        ->with('tickets',$tickets);
        //->with('activities',$activities);


    }

    public function getResponseTime(){

    	$activities = SupportActivity::all()->groupBy('ticket_id');
    	dd($activities);

    }

}