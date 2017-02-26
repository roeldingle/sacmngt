@extends('main.main')


@section('content')
    <div class="row-fluid">
        <div class="span8"></div>
        <div class="span4" style="border:1px solid #fff">

          <!--form-->
               <form id="loginform" class="form-horizontal" role="form" action="/registration" method="POST">
                    <h2>Let's be awesome :)</h2>
                    <hr />
                    <!--put this code for token-->
                    {{ csrf_field() }}
                    
                    <!--user role select type-->
                    <input type="hidden" class="form-control" name="role_id"  value="4">

                    <!--user role select type-->
                    <div class="form-group">
                       
                        <!--department-->
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                            <label for="department">Department :</label>
                            <select class="form-control" name="department_id">
                              <option value="0">--Select option--</option>
                            @foreach($departments as $department)
                              <option value="{{ $department->id }}" @if(isset($choosen_department_id) && $choosen_department_id == $department->id) selected  @endif >
                                {{ $department->name}}
                              </option>
                            @endforeach
                            </select>
                        </div>
                        <!--end department-->
                    </div>

                    <!--user email-->
                    <div class="form-group">
                       
                        <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                          <label for="department">Email Address :</label>
                          <input type="text" class="form-control" name="email" value="@if(isset($user)){{ old('email', $user->email) }}@endif" placeholder="Email Address">
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
        <!--end widget box-->
        
        
        </div>
      </div>
    </div>
  </div>
@stop