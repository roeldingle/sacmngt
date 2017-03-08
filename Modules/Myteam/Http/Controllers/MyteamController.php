<?php

namespace Modules\Myteam\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\User\Entities\User;
use Modules\Team\Entities\Team;
use Modules\Job\Entities\Job;
use Module;
use Validator;

class MyteamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $auth_team_id = isset(Auth::user()->meta->team_id) ? Auth::user()->meta->team_id : 0;


        if($auth_team_id  != 0){

            $team = Team::findOrFail($auth_team_id);
            $members = $team->members()->where('team_id',$team->id)->get();

            return view('myteam::index')
            ->with('team',$team)
            ->with('members',$members);
        }else{
            return view('myteam::index')
            ->with('members', null);
        }

    }

   public function add_task(Request $request){

        dd($request->name);
   }
}
