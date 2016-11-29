<!--panel form-->
<div class="panel-body" style="padding-top:0">
	<!--form-->
	<form class="form-horizontal" ticket="form" action="@if(isset($ticket)) {{ route('ticket.update' , ['id' => $ticket->id, 'department' => config('ticket.department') ] ) }} @else {{ route('ticket.store', ['department' => config('ticket.department')]) }} @endif" method="POST">

		<!--put this code for token-->
	    {{ csrf_field() }}

	    <!--user priority_level select type-->
	    <div style="margin-bottom: 25px" class="input-group">
	  		
			  <span class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
			  <select name="priority_id" class="form-control">

			  	@foreach(Modules\Ticket\Entities\Priority::active()->get() as $val)
			  		<option value="{{ $val->id }}"  @if(isset($ticket) && $ticket->priority_id == $val->id) selected @endif>{{ $val->name }}</option>
			  	@endforeach
			  </select>

			  
			
		</div>
	    <!--//user role select type-->
	    

	    <!--email input type-->
	    <div style="margin-bottom: 25px" class="input-group">
	        <span class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
	        <input type="text" class="form-control" name="subject" value="@if(isset($ticket)){{ old('subject', $ticket->subject) }}@endif" placeholder="Subject">
	    </div>
	    <!--//email input type-->

	    <!--fname input type-->
	    <div style="margin-bottom: 25px" class="input-group">
	        <span class="input-group-addon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
	        <textarea rows="4" class="form-control" name="message" placeholder="Message" >@if(isset($ticket)){{ old('message', $ticket->message )}}@endif</textarea>
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


