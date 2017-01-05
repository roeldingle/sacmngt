@extends('main.one-column-master')

@section('content')
    <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                        Registration
                        <small class="pull-right">
                            <a style="font-size: 70%;" href="/login" >Go to Login page</a>
                        </small>
                    </h4>
                </div>
                
            </div>  
            <div style="padding:30px" class="panel-body" >


                @include('main.alert')
                <!--form-->

                <form class="form-horizontal" role="form" action="/registration" method="POST">

                    <!--put this code for token-->
                    {{ csrf_field() }}
                    
                    <!--user role select type-->
                    <input type="hidden" class="form-control" name="role_id"  value="4">

                    <!--user role select type-->
                    <div class="form-group">
                       
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                          <label for="department">Department :</label>
                          <select class="form-control" id="department" name="department_id" value="@if(isset($user)){{ old('role_id', $user->role_id) }}@endif">
                                @foreach(\Modules\Department\Entities\Department::active()->get() as $department)
                                    <option value="{{ $department->id }}" @if(isset($user) && $user->department_id == $department->id){{ "selected" }}@endif >{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!--user email-->
                    <div class="form-group">
                       
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                          <label for="department">Email Address :</label>
                          <input type="text" class="form-control" name="email" value="@if(isset($user)){{ old('email', $user->email) }}@endif" placeholder="Email Address">
                        </div>
                    </div>

                    <!--user fname-->
                    <div class="form-group">
                       
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                          <label for="department">First name :</label>
                          <input type="text" class="form-control" name="fname" value="@if(isset($user)){{ old('fname', $user->setMeta()->fname)}}@endif" placeholder="First name">
                        </div>
                    </div>

                    <!--user lname-->
                    <div class="form-group">
                        
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                          <label for="department">Last name :</label>
                          <input type="text" class="form-control" name="lname" value="@if(isset($user)){{ old('lname', $user->setMeta()->lname) }}@endif" placeholder="Last name">
                        </div>
                    </div>

                    <!--user avatar-->
                    <div class="form-group">
                        
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                          <label for="department">Avatar :</label>
                          <input type="text" class="form-control" name="avatar" value="@if(isset($user)){{ old('avatar', $user->setMeta()->avatar)}}@endif" placeholder="Paste Avatar here">
                        </div>
                    </div>

                    <!--password-->
                    <div class="form-group">
                        
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                          <label for="department">Password :</label>
                          <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>

                    <!--password confirmation-->
                    <div class="form-group">
                        
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                          <label for="department">Password Confirmation :</label>
                          <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                        </div>
                    </div>

                        

                    <hr />

                    <div class="form-group">
                        <!-- Button -->                                        
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" name="register" class="btn btn-info"><i class="fa fa-address-card-o" aria-hidden="true" style="color:white;"></i> &nbsp Register</button>
                          	<!--Email-->
							<button type="button" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true" style="color:white;"></i> &nbsp Reset</button>
                        </div>
                    </div>
                    
                </form>
             </div>
        </div>

    </div> 
@stop
