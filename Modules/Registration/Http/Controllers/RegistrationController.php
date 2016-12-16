<?php

namespace Modules\Registration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

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

        return view('registration::index');
    }

    public function postRegister(Request $request){

        

        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'department_id' => 'required',
            'email' => 'required|unique:users,email,NULL,id,is_active,1|email|max:255',
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|min:3|same:password',
        ]);


        if ($validator->fails()) {
            return redirect('/registration')
                        ->withErrors($validator);
        }

        $created = User::saveUser($request->all());

        if($created){
            return redirect('login')
            ->with('user',$created)
            ->with('info','New user created successfully!');
        }

       
    }
}
