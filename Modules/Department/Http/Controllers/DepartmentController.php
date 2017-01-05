<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Department\Entities\Department;
use Module;
use Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $per_page = config('app.default_table_limit');
        $departments = Department::active()->paginate($per_page);

        return view('department::index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('departments',$departments);
    }

    public function show($id){

        $department = Department::findOrFail($id);

        return view('department::show')
        ->with('department', $department);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('department::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name,NULL,id,is_active,1',
            'description' => 'required|min:2',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('department.create')
                ->withErrors($validator);
        }


        $department = new Department();
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->is_active = true;
        $department->save();


        if($department){
            return redirect()
            ->route('department.edit', ['id' => $department->id])
            ->with('info','New Role created successfully!')
            ->with('alert', 'alert-success');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $department = Department::findOrFail($id);

        return view('department::edit')
        ->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id){

        $department = Department::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name,'.$id.',id,is_active,1',
            'description' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('department.edit',['id' => $department->id])
                ->withErrors($validator);
        }

        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->is_active = true;
        $department->save();

        
        if($department){
            return redirect()
            ->route('department.edit',['id' => $department->id])
            ->with('info','Department has been updated!')
            ->with('alert', 'alert-success');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request){

       $values = array('is_active'=> 0);
       
       $affectedRows = Role::whereIn('id',$request->id)->update($values);

        \Session::flash('info','Role has been deleted!');
        \Session::flash('alert', 'alert-danger');

        $return = [
            'affectedRows' => $affectedRows,
            'redirect' => $request->return_route
        ];

        return $return;
        
    }
}
