<?php

namespace Modules\Myteam\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\User\Entities\User;
use Modules\Team\Entities\Team;
use Modules\Myteam\Entities\Mytask;
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

        $validator = Validator::make($request->all(), [
            'assign_id' => 'required',
            'name' => 'required',
            'start_at' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('myteam.index')
                ->withErrors($validator);
        }


        $mytask = new Mytask();
        $mytask->team_id = $request->input('team_id');
        $mytask->assign_id = $request->input('assign_id');
        $mytask->name = $request->input('name');
        $mytask->start_at = $request->input('start_at');
        $mytask->end_at = ($request->input('end_at') !== '') ? $request->input('end_at') : $request->input('start_at');
        $mytask->is_active = true;
        $mytask->save();


        if($mytask){
            return redirect()
            ->route('myteam.index')
            ->with('info','New Task created successfully!')
            ->with('alert', 'alert-success');
        }
   }
}
