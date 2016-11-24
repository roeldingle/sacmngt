@extends('layouts.master')

@section('content')
        <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>
                            Login
                            <small class="pull-right">
                                <a style="font-size: 70%;" href="/registration" >Go to Registration page</a>
                            </small>
                        </h4>
                        <!-- <div class="pull-right"><a style="font-size: 70%;" href="/registration" >Go to Registration page</a></div> -->
                    </div>
                    
                </div>     

                <div style="padding-top:30px" class="panel-body" >


                    @include('layouts.alert')

                    <!--form-->
                    <form id="loginform" class="form-horizontal" role="form" action="/login" method="POST">

                        {{ csrf_field() }}
                                
                        <div style="margin-bottom: 25px" class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" value="" placeholder="Email" required>                                        
                        </div>
                            
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
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


                        <div style="margin-top:10px" class="form-group pull-right">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-sign-in" aria-hidden="true" style="color:white;"></i> &nbsp Login</button>
                              	<!--Email-->
							   <button type="button" class="btn btn-danger btn-email"><i class="fa fa-google" aria-hidden="true" style="color:white;"></i> &nbsp Sign In with Gmail</button>
                            </div>
                        </div>


                          
                    </form>   


                </div>                     
            </div>  
        </div>
        
    </div>
    
@stop



