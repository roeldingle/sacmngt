<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Module;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('login::index');
    }


    public function postLogin(Request $request){
        
        /*
            Validate user credentials and check if user is active
        */
        if(!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'is_active' => 1], $request->has('remember'))){
            return redirect()
            ->back()
            ->with('info','Could not login!')
            ->with('alert', 'alert-danger');
        }

        return redirect('dashboard')
            ->with('info','You are now login!')
            ->with('alert', 'alert-success');

    }


    public function getLogout(){

        Auth::logout();

        return redirect('login')
            ->with('info','You are logout!')
            ->with('alert', 'alert-warning');
    }

    
}
