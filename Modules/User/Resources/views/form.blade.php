@extends('base::layouts.master')


@section('content')

    @include('base::layouts.navigation')
    <div class="clearfix"></div>
    @include('base::layouts.subnavigation')
    <!--main-->
    <div class="container-fluid" id="main">

       	<div class="row">
       		<!--put left profile layout from base-->
        	@include('base::layouts.left-profile')

            <!--center -->
        	<div class="col-sm-9 col-md-9">

        	  <!--put alert layout from base-->
              @include('base::layouts.alert')
            	
            	<!--breadcrumbs-->
              	<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Library</a></li>
				  <li class="active">Data</li>
				</ol>
				<!--//breadcrumbs-->

				<!--panel-->
                <div class="panel panel-default">

                	<!--panel head-->
                  	<div class="panel-heading">
		                <h3>@if(isset($user)) Edit @else Create @endif User</h3>
	                </div>
	                <!--//panel head-->

					<!--panel body-->
					<div class="panel-body" style="padding-top:0">
						<!--form-->
						<form class="form-horizontal" role="form" action="@if(isset($user)) {{ route('user.update' , ['id' => $user->id] ) }} @else {{ route('user.store') }} @endif" method="POST">

							<!--put this code for token-->
						    {{ csrf_field() }}
						    
						    <!--user role select type-->
						  	<div style="margin-bottom: 25px" class="input-group">
						        <span class="input-group-addon"><i class="fa fa-cog" aria-hidden="true"></i></span>
						      
						        <div class="input-group  col-sm-6 col-md-6" style="padding-left: 0;">
						            <div class="input-group-btn search-panel">
						                <button type="button" style="width:100%;text-align: left;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						                	<span id="search_concept" style="text-align:left">
						                	  @if(isset($user))
						                		 {{ old('role_id', $user->role->name) }}
						            		  @else
						            		   Select User Role 
						            		  @endif
						                	</span> 
						                	<span class="caret pull-right"></span>
						                </button>
						                <ul class="dropdown-menu" role="menu" style="width:100%;text-align: left;">
						                  <li><a href="#1">Superadmin</a></li>
						                  <li><a href="#2">Admin</a></li>
						                  <li><a href="#3">Staff</a></li>
						                  <li><a href="#4">User</a></li>
						                </ul>
						            </div>
						            <input type="hidden" name="role_id" value="@if(isset($user)) {{ old('role_id', $user->role_id) }} @endif"  id="search_param">         
						        </div>
						    </div>
						    <!--//user role select type-->

						    <!--email input type-->
						    <div style="margin-bottom: 25px" class="input-group">
						        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						        <input type="text" class="form-control" name="email" value="@if(isset($user)) {{ old('email', $user->email) }} @endif" placeholder="Email Address">
						    </div>
						    <!--//email input type-->

						    <!--fname input type-->
						    <div style="margin-bottom: 25px" class="input-group">
						        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
						        <input type="text" class="form-control" name="fname" value="@if(isset($user)) {{ old('fname', $user->setMeta()->fname) }} @endif" placeholder="First name">
						    </div>
						    <!--//fname input type-->

						    <!--lname input type-->
						    <div style="margin-bottom: 25px" class="input-group">
						        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
						        <input type="text" class="form-control" name="lname" value="@if(isset($user)) {{ old('lname', $user->setMeta()->lname) }} @endif" placeholder="Last name">
						    </div>
						    <!--//lname input type-->

						    <!--avatar input type-->
						    <div style="margin-bottom: 25px" class="input-group">
						        <span class="input-group-addon"><i class="fa fa-photo" aria-hidden="true"></i></span>
						        <input type="text" class="form-control" name="avatar" value="@if(isset($user)) {{ old('avatar', $user->setMeta()->avatar) }} @endif" placeholder="Paste Avatar here">
						    </div>
						    <!--//avatar input type-->

						    <hr />

						    <!--buttons-->
						    <div class="form-group">
						        <!-- Button -->                                        
						        <div class="col-sm-12 col-md-12" style="text-align:center">
						            <button type="submit" class="btn btn-info" ><i class="fa fa-floppy-o" aria-hidden="true" style="color:white;"></i> &nbsp Save</button>
						            <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true" style="color:white;"></i> &nbsp Reset</button>
						        </div>
						    </div>
						    <!--//buttons-->
						</form>
						<!--//form-->
					</div>
					<!--/panel body-->

                  <div class="panel-footer">
	                <div class="row">
	                  <div class="col col-xs-4">
	                  	
	                  <div class="col col-xs-8" style="text-align:right">
	                   
	                  </div>
	                </div>
	              </div>


                </div>
            </div>
            <!--/center-->
      	</div><!--/row-->
      
      @include('base::layouts.footer')
      
    </div>
    <!--//main-->

@stop


