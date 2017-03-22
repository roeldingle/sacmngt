<?php

namespace Modules\Ticket\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Modules\Ticket\Entities\Ticket;
use Modules\Department\Entities\Department;
use Auth;

class TicketMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $department_segment = $request->segment('2');

        $request->department = Department::active()->where('name', strtolower($department_segment))->first();


        if($request->department !== null){

            if(
                $request->segment('3') !== null 
                && in_array($request->route()->getName(), ['ticket.create','ticket.store','ticket.destroy'] ) == false
                ){

                $code = $request->segment('3');
                $ticket = $request->department->ticket->where('code', $code)->first();

                if(empty($ticket)){
                    return abort(401, 'Unauthorized action.');
                }

                if($ticket->user_id == Auth::user()->id){
                    return $next($request);
                }else{
                    return abort(401, 'You are not authorized to view this.');
                }

            }else{
                return $next($request);
            }

        }else{
            //return abort(404, 'Page not found.');
            return $next($request);
        }

        
    }
}
