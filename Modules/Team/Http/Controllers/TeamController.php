<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Department\Entities\Department;
use Modules\Team\Entities\Team;
use Modules\User\Entities\User;
use Module;
use Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

      $teams = Team::getTeamSearch($request);

        return view('team::index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('teams',$teams);

    }

    public function show($id){

        $team = Team::findOrFail($id);

        return view('team::show')
        ->with('team', $team);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {

        /*for select department*/
        $departments = Department::active()->get();

        if(isset($request->department_id) && $request->department_id != 0){
            $leaders = User::active()->where('department_id', $request->department_id)->get();
            $choosen_department_id = $request->department_id;

        }else{
            $leaders = User::active()->get();
            $choosen_department_id = null;
        }



        return view('team::create')
            ->with('departments', $departments)
            ->with('leaders', $leaders)
            ->with('choosen_department_id', $choosen_department_id);
        
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            //'leader' => 'required',
            'name' => 'required|unique:teams,name,NULL,id,is_active,1',
            'description' => 'required|min:2',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('team.create')
                ->withErrors($validator);
        }


        $team = new Team();
        $team->department_id = $request->input('department_id');
        $team->leader_id = $request->input('leader_id');
        $team->name = $request->input('name');
        $team->description = $request->input('description');
        $team->is_active = true;
        $team->save();


        if($team){

            /*update user team set as leader*/
            if(isset($team->leader_id) && $team->leader_id != 0){
                User::find($team->leader_id)->meta->update(['team_id' => $team->id]);
            }

            return redirect()
            ->route('team.show', ['id' => $team->id])
            ->with('info','New Team created successfully!')
            ->with('alert', 'alert-success');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $team = Team::findOrFail($id);


      /*for select department*/
        $leaders = User::active()->where('department_id', $team->department->id)->get();
        $choosen_department_id = $team->department->id;

        return view('team::edit')
        ->with('team', $team)
        ->with('leaders', $leaders)
        ->with('choosen_department_id', $choosen_department_id);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id){

        $team = Team::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            'name' => 'required|unique:teams,name,'.$id.',id,is_active,1',
            //'description' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('team.edit',['id' => $team->id])
                ->withErrors($validator);
        }

        $team->department_id = $request->input('department_id');
        $team->leader_id = $request->input('leader_id');
        $team->name = $request->input('name');
        $team->description = $request->input('description');
        $team->is_active = true;
        $team->save();

        if($team){

            /*update user team set as leader*/
            if(isset($team->leader_id)){
             
                if($leader_meta = User::find($team->leader_id)->meta !== null){
                  $leader_meta->update(['team_id' => $team->id]);
                }
                
            }

            return redirect()
            ->route('team.show',['id' => $team->id])
            ->with('info','Team has been updated!')
            ->with('alert', 'alert-success');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request){

       $values = array('is_active'=> 0);
       
       $affectedRows = Team::whereIn('id',$request->id)->update($values);

        \Session::flash('info','Team has been deleted!');
        \Session::flash('alert', 'alert-danger');

        $return = [
            'affectedRows' => $affectedRows,
            'redirect' => $request->return_route
        ];

        return $return;
        
    }


    /*ajax get department users for leader/poc*/
    public function getDepartmentUserData(Request $request){

       $users_raw = User::active()->where($request->category, $request->id)->get();


        $users = $users_raw->map(function($items){
            return [
             'id' => $items->id,
             'name' => $items->setMeta()->fname . ' ' . $items->setMeta()->lname,
             ];
        });

        return $users;
        

    }

    /*ajax get department users for leader/poc*/
    public function getDepartmentTeamData(Request $request){

       $teams_raw = Team::active()->where($request->category, $request->id)->get();


        $teams = $teams_raw->map(function($items){
            return [
             'id' => $items->id,
             'name' => $items->name,
             ];
        });

        return $teams;
        

    }


}
