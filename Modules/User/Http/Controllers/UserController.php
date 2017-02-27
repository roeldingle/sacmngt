<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\User\Entities\User;
use Modules\User\Entities\Meta;
use Modules\Department\Entities\Department;
use Modules\Role\Entities\Role;
use Modules\Team\Entities\Team;
use Modules\Job\Entities\Job;
use Module;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

        $users = User::getUserSearch($request);

        return view('user::index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('users',$users);
    }

    public function show($id){

        $user = User::findOrFail($id);

        /*for select role*/
        $roles = Role::active()->pluck('name', 'id');
        $roles->prepend('--Select options--');

        /*for select team*/
        $teams = Team::active()->pluck('name', 'id');
        $teams->prepend('--Select options--');


        return view('user::show')
        ->with('user', $user)
        ->with('roles', $roles)
        ->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        /*for select role*/
        $roles = Role::active()->pluck('name', 'id');
        $roles->prepend('--Select options--');

        /*for select department*/
        $departments = Department::active()->get();

        /*jobs*/
        if(isset($request->department_id) && $request->department_id != 0){
            $teams = Team::active()->where('department_id', $request->department_id)->get();
            $jobs = Job::active()->where('department_id', $request->department_id)->get();
            $choosen_department_id = $request->department_id;

        }else{
            $teams = Team::active()->get();
            $jobs = Job::active()->get();
            $choosen_department_id = null;
        }

        return view('user::create')
            ->with('departments', $departments)
            ->with('teams', $teams)
            ->with('jobs', $jobs)
            ->with('roles', $roles)
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
            'role_id' => 'required',
            'department_id' => 'required',
            //'team_id' => 'required',
            //'job_id' => 'required',
            'email' => 'required|unique:users,email,NULL,id,is_active,1|email|max:255',
            'fname' => 'required|min:2',
            'mname' => 'required|min:2',
            'lname' => 'required|min:2',
            'contact' => 'required',
            'date_hired' => 'required',
            'avatar' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('user.create')
                ->withErrors($validator);
        }

        $created = User::saveUser($request->all());


        if($created){
            return redirect()
            ->route('user.show',['id' => $created->id])
            ->with('info','New User created successfully!')
            ->with('alert', 'alert-success');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);

      $roles = Role::active()->pluck('name', 'id');
      $roles->prepend('--Select options--');

      /*for select department*/
      $departments = Department::active()->pluck('name', 'id');
      $departments->prepend('--Select options--');

      /*for select department*/
      $teams = Team::active()->where('department_id', $user->department_id)->get();
      $jobs = Job::active()->where('department_id', $user->department_id)->get();
      $choosen_department_id = $user->department_id;


        return view('user::edit')
        ->with('user', $user)
        ->with('departments', $departments)
        ->with('teams', $teams)
        ->with('jobs', $jobs)
        ->with('roles', $roles)
        ->with('choosen_department_id', $choosen_department_id);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            //'department_id' => 'required',
            //'team_id' => 'required',
            //'job_id' => 'required',
            'email' => 'required|unique:users,email,'.$id.',id,is_active,1|email|max:255',
            'fname' => 'required|min:2',
            'mname' => 'required|min:2',
            'lname' => 'required|min:2',
            'contact' => 'required',
            'date_hired' => 'required',
            'avatar' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('user.edit',['id' => $user->id])
                ->withErrors($validator);
        }

        $updated = User::saveUser($request->all(), $user);

        
        if($updated){
            return redirect()
            ->route('user.show',['id' => $user->id])
            ->with('info','User has been updated!')
            ->with('alert', 'alert-success');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request){

       $values = array('is_active'=> 0);
       
       $affectedRows = User::whereIn('id',$request->id)->update($values);

        \Session::flash('info','User(s) has been deleted!');
        \Session::flash('alert', 'alert-danger');

        $return = [
            'affectedRows' => $affectedRows,
            'redirect' => $request->return_route
        ];

        return $return;
        
    }
}
