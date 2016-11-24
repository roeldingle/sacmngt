<!--panel form-->
<div class="panel-body" style="padding-top:0">
	<!--form-->
	<form class="form-horizontal" role="form" action="@if(isset($role)) {{ route('role.update' , ['id' => $role->id] ) }} @else {{ route('role.store') }} @endif" method="POST">

		<!--put this code for token-->
	    {{ csrf_field() }}
	    

	    <!--email input type-->
	    <div style="margin-bottom: 25px" class="input-group">
	        <span class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
	        <input type="text" class="form-control" name="name" value="@if(isset($role)){{ old('name', $role->name) }}@endif" placeholder="Role name">
	    </div>
	    <!--//email input type-->

	    <!--fname input type-->
	    <div style="margin-bottom: 25px" class="input-group">
	        <span class="input-group-addon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
	        <textarea rows="4" class="form-control" name="description" placeholder="Description" >@if(isset($role)){{ old('description', $role->description )}}@endif</textarea>
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


