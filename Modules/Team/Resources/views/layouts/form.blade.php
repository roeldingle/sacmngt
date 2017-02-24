<!--panel form-->
<div class="panel-body" style="padding-top:0">
	<!--form-->
	<form class="form-horizontal" id="team_form" name="team_form" action="@if(isset($team)) {{ route('team.update' , ['id' => $team->id] ) }} @else {{ route('team.store') }} @endif" method="POST">

		<!--put this code for token-->
	    {{ csrf_field() }}
	    

	    <!--department select type-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="department">Department :</label>
			  <select class="selector-form form-control" id="department" data-getmodel="team" data-route="getdepartmetuser" data-populate="leader" name="department" value="@if(isset($team)){{ old('department_id', $team->department_id) }}@endif">
			  		<option value="0">--Select--</option>
			  		@foreach(\Modules\Department\Entities\Department::active()->get() as $department)
                		<option value="{{ $department->id }}" @if(isset($team) && $team->department_id == $department->id){{ "selected" }}@endif >{{ $department->name }}</option>
                	@endforeach
		    	</select>
	    	</div>
	    </div>

	   

	     <!--name-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="name">Name :</label>
			  <input type="text" class="form-control" name="name" value="@if(isset($team)){{ old('name', $team->name) }}@endif" placeholder="Name">
	    	</div>
	    </div>

	    <!--description-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="description">Description :</label>
			  <textarea rows="4" class="form-control" name="description" placeholder="Description" >@if(isset($team)){{ old('description', $team->description )}}@endif</textarea>
	    	</div>
	    </div>

	    <!--leader select type-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="leader">Team Leader/POC :</label>
			  <select class="form-control" id="leader" name="leader" >
			  		<option value="0">--Select--</option>
			  		@if(isset($team))
						@foreach(\Modules\User\Entities\User::active()->where('department_id', $team->department_id)->get() as $leader)
	                		<option value="{{ $leader->id }}" @if(isset($team) && $team->leader_id == $leader->id){{ "selected" }}@endif >{{ $leader->setMeta()->fname }} {{ $leader->setMeta()->lname }}</option>
	                	@endforeach
			  		@endif
		    	</select>
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


