<!--panel form-->
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
	            <input type="hidden" name="role_id" value="@if(isset($user)){{ old('role_id', $user->role_id) }}@endif"  id="search_param">         
	        </div>
	    </div>
	    <!--//user role select type-->

	    <!--email input type-->
	    <div style="margin-bottom: 25px" class="input-group">
	        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
	        <input type="text" class="form-control" name="email" value="@if(isset($user)){{ old('email', $user->email) }}@endif" placeholder="Email Address">
	    </div>
	    <!--//email input type-->

	    <!--fname input type-->
	    <div style="margin-bottom: 25px" class="input-group">
	        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
	        <input type="text" class="form-control" name="fname" value="@if(isset($user)){{ old('fname', $user->setMeta()->fname)}}@endif" placeholder="First name">
	    </div>
	    <!--//fname input type-->

	    <!--lname input type-->
	    <div style="margin-bottom: 25px" class="input-group">
	        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
	        <input type="text" class="form-control" name="lname" value="@if(isset($user)){{ old('lname', $user->setMeta()->lname) }}@endif" placeholder="Last name">
	    </div>
	    <!--//lname input type-->

	    <!--avatar input type-->
	    <div style="margin-bottom: 25px" class="input-group">
	        <span class="input-group-addon"><i class="fa fa-photo" aria-hidden="true"></i></span>
	        <input type="text" class="form-control" name="avatar" value="@if(isset($user)){{ old('avatar', $user->setMeta()->avatar)}}@endif" placeholder="Paste Avatar here">
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
<!--/panel form-->