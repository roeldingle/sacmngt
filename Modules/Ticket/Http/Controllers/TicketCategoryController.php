<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\Ticket\Entities\TicketCategory;
use Module;
use Validator;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $per_page = config('app.default_table_limit');
        $category = TicketCategory::active()->where('department_id', $request->department->id)->get();

        return view('ticket::category.index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('category',$category);
    }

    public function show($id){

        $category = TicketCategory::findOrFail($id);

        return view('ticket::category.show')
        ->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ticket::category.create');
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
            'severity_level' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('ticket-category.create')
                ->withErrors($validator);
        }


        $category = new TicketCategory();
        $category->department_id = $request->department->id;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->severity_level = $request->input('severity_level');
        $category->is_active = true;
        $category->save();


        if($category){
            return redirect()
            ->route('ticket-category.edit', ['id' => $category->id])
            ->with('info','New Category created successfully!')
            ->with('alert', 'alert-success');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $category = TicketCategory::findOrFail($id);

        return view('ticket::category.edit')
        ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id){

        $category = TicketCategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,NULL,id,is_active,1',
            'description' => 'required|min:2',
            'severity_level' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('role.edit',['id' => $role->id])
                ->withErrors($validator);
        }

        $category->department_id = $request->department->id;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->severity_level = $request->input('severity_level');
        $category->is_active = true;
        $category->save();

        
        if($category){
            return redirect()
            ->route('ticket-category.edit',['id' => $category->id])
            ->with('info','Category has been updated!')
            ->with('alert', 'alert-success');
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request){

       $values = array('is_active'=> 0);
       
       $affectedRows = TicketCategory::whereIn('id',$request->id)->update($values);

        \Session::flash('info','Category has been deleted!');
        \Session::flash('alert', 'alert-danger');

        $return = [
            'affectedRows' => $affectedRows,
            'redirect' => $request->return_route
        ];

        return $return;
        
    }
}
