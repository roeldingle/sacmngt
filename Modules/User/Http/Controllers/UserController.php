<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Modules\User\Entities\User;
use Modules\User\Entities\Meta;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $per_page = 2;
        
        $users = User::paginate($per_page);

        if ($request->input('search_param') !== "all" && $request->has('search_param') && $request->has('search')) {

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $meta_array = array('fname','lname');

            if(in_array($search['search_param'], $meta_array)){

                $users = User::active()->with('meta')
                ->whereHas('meta', function ($query) use ($search) {
                    $query->where('meta_user.key', $search['search_param']);
                    $query->where('meta_user.value','LIKE', '%'.$search['search'].'%');
                })
                ->paginate($per_page);

            }else{
                $users = User::where($search['search_param'], 'LIKE', '%'.$search['search'].'%')->paginate($per_page);
            }


        }


        /*all*/
        if ($request->input('search_param') == "all"){

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $users = User::active()->with('meta')
            ->whereHas('meta', function ($query) use ($search) {
                $query->where('users.email','LIKE', '%'.$search['search'].'%');
                $query->orWhere('meta_user.value','LIKE', '%'.$search['search'].'%');
            })
            ->paginate($per_page);
        }


        

        return view('user::index')
        ->with('search', (isset($search)) ? $search : 0)
        ->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }
    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
