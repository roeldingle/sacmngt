<?php

namespace Modules\Job\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Department\Entities\Department;
use Modules\Job\Entities\Job;
use Modules\User\Entities\User;
use Module;
use Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

      $jobs = Job::getJobSearch($request);

        return view('job::index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('jobs',$jobs);

    }

    public function show($id){

        $job = Job::findOrFail($id);

        /*for select department*/
        $departments = Department::active()->pluck('name', 'id');
        $departments->prepend('--Select options--');

        return view('job::show')
        ->with('job', $job)
        ->with('departments', $departments);
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
            $choosen_department_id = $request->department_id;

        }else{
            $choosen_department_id = null;
        }

        return view('job::create')
            ->with('departments', $departments)
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
            'name' => 'required|unique:Jobs,name,NULL,id,is_active,1',
            'description' => 'required|min:2',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('job.create')
                ->withErrors($validator);
        }


        $job = new Job();
        $job->department_id = $request->input('department_id');
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->is_active = true;
        $job->save();


        if($job){
            return redirect()
            ->route('job.show', ['id' => $job->id])
            ->with('info','New Job created successfully!')
            ->with('alert', 'alert-success');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $job = Job::findOrFail($id);


      /*for select department*/
        $choosen_department_id = $job->department->id;

        return view('job::edit')
        ->with('job', $job)
        ->with('choosen_department_id', $choosen_department_id);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id){

        $job = Job::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            'name' => 'required|unique:Jobs,name,'.$id.',id,is_active,1',
            //'description' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('job.edit',['id' => $job->id])
                ->withErrors($validator);
        }

        $job->department_id = $request->input('department_id');
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->is_active = true;
        $job->save();

        if($job){
            return redirect()
            ->route('job.show',['id' => $job->id])
            ->with('info','Job has been updated!')
            ->with('alert', 'alert-success');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request){

       $values = array('is_active'=> 0);
       
       $affectedRows = Job::whereIn('id',$request->id)->update($values);

        \Session::flash('info','Job has been deleted!');
        \Session::flash('alert', 'alert-danger');

        $return = [
            'affectedRows' => $affectedRows,
            'redirect' => $request->return_route
        ];

        return $return;
        
    }




}
