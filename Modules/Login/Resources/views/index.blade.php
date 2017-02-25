@extends('main.main')


@section('content')
    <div class="row-fluid">
        <div class="span8"></div>
      <div class="span4" style="border:2px solid red">
          <!--form-->
            <form id="loginform" class="form-horizontal" role="form" action="/login" method="POST">
                {{ csrf_field() }}
                <!--user email-->
                <div class="form-group">
                    <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                      <label for="email">Email Address :</label>
                      <input type="text" class="form-control" name="email" value="@if(isset($user)){{ old('email', $user->email)}}@endif" placeholder="Email" required>  
                    </div>
                </div>

                <!--user email-->
                <div class="form-group">
                    <div class="col-sm-12 col-md-12" style="padding-left: 0;">
                      <label for="password">Password :</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" value="" required>
                    </div>
                </div>
                        
                <div class="input-group">
                  <div class="checkbox">
                    <label>
                      <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                    </label>
                  </div>
                </div>

                <hr />
                <div style="font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>

                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-sign-in" aria-hidden="true" style="color:white;"></i> &nbsp Login</button>
                    <!--Email-->
                   <button type="button" class="btn btn-danger btn-email"><i class="fa fa-google" aria-hidden="true" style="color:white;"></i> &nbsp Sign In with Gmail</button>
               
                </div>
            </form>   


        </div>
        <!--end widget box-->
        
        </div>
      </div>
    </div>
  </div>
@stop