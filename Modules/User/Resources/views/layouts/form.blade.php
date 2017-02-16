<!--panel form-->
<div class="panel-body" style="padding:30px">
	<!--form-->
	<form class="form-horizontal" role="form" action="@if(isset($user)) {{ route('user.update' , ['id' => $user->id] ) }} @else {{ route('user.store') }} @endif" method="POST">

		<!--put this code for token-->
	    {{ csrf_field() }}
	    
	    <!--user role select type-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="role">Role :</label>
			  <select class="form-control" id="role" name="role_id" value="@if(isset($user)){{ old('role_id', $user->role_id) }}@endif">

		    		@foreach(\Modules\Role\Entities\Role::active()->get() as $role)
		        		<option value="{{ $role->id }}" @if(isset($user) && $user->role_id == $role->id){{ "selected" }}@endif >{{ $role->name }}</option>
		        	@endforeach
		    	</select>
	    	</div>
	    </div>


	    <!--user email-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="department">Email Address :</label>
			  <input type="text" class="form-control" name="email" value="@if(isset($user)){{ old('email', $user->email) }}@endif" placeholder="Email Address">
	    	</div>
	    </div>

	    <!--user fname-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="department">First name :</label>
			  <input type="text" class="form-control" name="fname" value="@if(isset($user)){{ old('fname', $user->setMeta()->fname)}}@endif" placeholder="First name">
	    	</div>
	    </div>

	    <!--user lname-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="department">Last name :</label>
			  <input type="text" class="form-control" name="lname" value="@if(isset($user)){{ old('lname', $user->setMeta()->lname) }}@endif" placeholder="Last name">
	    	</div>
	    </div>

	    <!--user avatar-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="department">Avatar :</label>
			  <input type="text" class="form-control" name="avatar" value="@if(isset($user)){{ old('avatar', $user->setMeta()->avatar)}}@endif" placeholder="Paste Avatar here">
	    	</div>
	    </div>

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