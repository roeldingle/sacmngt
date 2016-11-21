<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\User\Entities\User;
use Modules\User\Entities\Meta;
use Module;
use Config;
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

        return view('user::show')
        ->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::form');
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
            'email' => 'required|unique:users,email,NULL,id,is_active,1|email|max:255',
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'avatar' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->route('user.create')
                ->withErrors($validator);
        }

        $created = User::saveUser($request->all());

        dd($created);

        if($created){
            return redirect()
            ->route('user.edit', ['id' => $created->id])
            ->with('info','New user created successfully!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);

        return view('user::form')
        ->with('user', $user);
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
            'email' => 'required|unique:users,email,'.$id.',id,is_active,1|email|max:255',
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'avatar' => 'required',
        ]);

        

        User::editUser($request, $user);

        return redirect()
            ->route('user.edit',['id' => $user->id])
            ->with('info','User has been updated!')
            ->with('alert', 'alert-success');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
