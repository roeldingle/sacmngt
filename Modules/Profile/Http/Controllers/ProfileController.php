<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\User\Entities\User;
use Modules\Team\Entities\Team;
use Modules\Job\Entities\Job;
use Module;
use Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $user = User::findOrFail(Auth::user()->id);

        return view('profile::show')
        ->with('user',$user);
    }

    public function edit()
    {

        $user = User::findOrFail(Auth::user()->id);


         /*for select department*/
      $teams = Team::active()->where('department_id', $user->department_id)->get();
      $jobs = Job::active()->where('department_id', $user->department_id)->get();
      $choosen_department_id = $user->department_id;


        return view('profile::edit')
        ->with('user',$user)
        ->with('teams', $teams)
        ->with('jobs', $jobs)
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
            ->route('profile.index')
            ->with('info','Profile has been updated!')
            ->with('alert', 'alert-success');
        }

    }

    public function change_password()
    {
        return view('profile::change_password');
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|min:3|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('profile.change_password')
                ->withErrors($validator);
        }

        $input = $request->all();

        $credentials = ['email' => Auth::user()->email, 'password' => $input['current_password'] ];

        if (Auth::validate($credentials)) {
            $update_password = Auth::user()->update(['password' => bcrypt($input['password'])]);

            if($update_password){
                return redirect()
                ->route('profile.index')
                ->with('info','Password has been updated!')
                ->with('alert', 'alert-success');
            }

        }else{
            return redirect()
                ->route('profile.change_password')
                ->with('info','Incorrect current password!')
                ->with('alert', 'alert-danger');
        }

    }

}
