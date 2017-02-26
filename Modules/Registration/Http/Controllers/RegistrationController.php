<?php

namespace Modules\Registration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Department\Entities\Department;
use Modules\User\Entities\User;
use Validator;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        /*for select department*/
        $departments = Department::active()->get();

        return view('registration::index')
        ->with('departments',$departments);
    }

    public function postRegister(Request $request){

        $input = $request->all();

        $validator = Validator::make($input, [
            'role_id' => 'required',
            'department_id' => 'required',
            'email' => 'required|unique:users,email,NULL,id,is_active,1|email|max:255',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|min:3|same:password',
        ]);


        if ($validator->fails()) {
            return redirect('/registration')
                        ->withErrors($validator);
        }

        $user = new User();
        $user->role_id = $input['role_id'];
        $user->department_id = $input['department_id'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->is_active = true;
        $user->save();

        if($user){
            return redirect('login')
            ->with('user',$user)
            ->with('info','New user created successfully!');
        }

       
    }
}
