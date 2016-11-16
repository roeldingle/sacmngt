@extends('base::layouts.master')

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
            <div style="padding-top:30px" class="panel-body" >


                 @include('base::layouts.alert')
                <!--form-->

                <form class="form-horizontal" role="form" action="/registration" method="POST">

                    {{ csrf_field() }}
                    
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>
                    <!---->
                    <input type="hidden" class="form-control" name="role_id" value="1" />
                        
                  
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                    </div>
                
                        
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="fname" placeholder="First name">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="lname" placeholder="Last name">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                    </div>
                        

                    <hr />

                    <div class="form-group">
                        <!-- Button -->                                        
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" name="register" class="btn btn-info"><i class="fa fa-address-card-o" aria-hidden="true" style="color:white;"></i> &nbsp Register</button>
                          	<!--Email-->
							<button type="button" class="btn btn-danger btn-email"><i class="fa fa-google" aria-hidden="true" style="color:white;"></i> &nbsp Sign Up with Gmail</button>
                        </div>
                    </div>
                    
                </form>
             </div>
        </div>

    </div> 
@stop
