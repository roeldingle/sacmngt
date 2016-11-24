<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Role\Entities\Role;
use Module;
use Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $per_page = config('app.default_table_limit');
        $roles = Role::active()->paginate($per_page);

        return view('role::index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('roles',$roles);
    }

    public function show($id){

        $role = Role::findOrFail($id);

        return view('role::show')
        ->with('role', $role);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('role::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,NULL,id,is_active,1',
            'description' => 'required|min:2',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('role.create')
                ->withErrors($validator);
        }


        $role = new Role();
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->is_active = true;
        $role->save();


        if($role){
            return redirect()
            ->route('role.edit', ['id' => $role->id])
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
      $role = Role::findOrFail($id);

        return view('role::edit')
        ->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id){

        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,'.$id.',id,is_active,1',
            'description' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('role.edit',['id' => $role->id])
                ->withErrors($validator);
        }

        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->is_active = true;
        $role->save();

        
        if($role){
            return redirect()
            ->route('role.edit',['id' => $role->id])
            ->with('info','Role has been updated!')
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
