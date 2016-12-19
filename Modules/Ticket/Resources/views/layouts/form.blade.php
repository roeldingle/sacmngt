<!--panel form-->
<div class="panel-body" style="padding-top:0">
	<!--form-->
	@if(Auth::user()->role->id == 4)
	<form class="form-horizontal" enctype="multipart/form-data" ticket="form" action="@if(isset($ticket)) {{ route('ticket.update' , ['code' => $ticket->code, 'department' => config('ticket.department') ] ) }} @else {{ route('ticket.store', ['department' => config('ticket.department')]) }} @endif" method="POST">
	@else
	<form class="form-horizontal" enctype="multipart/form-data" ticket="form" action="@if(isset($ticket)) {{ route('support.update' , ['code' => $ticket->code, 'department' => config('support.department') ] ) }} @else {{ route('support.store', ['department' => config('support.department')]) }} @endif" method="POST">
	@endif
		<!--put this code for token-->
	    {{ csrf_field() }}

	    @if(Auth::user()->role->id != 4)
	    <!--user list type-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="role">User :</label>
			  <select name="user_id" class="form-control">

			  	@foreach(Modules\User\Entities\User::active()->get() as $user)
			  		<option value="{{ $user->id }}"  @if(isset($ticket) && $ticket->user->id == $user->id) selected @endif>{{ $user->setMeta()->fname }} {{ $user->setMeta()->lname }}</option>
			  	@endforeach
			  </select>
	    	</div>
	    </div>
	    @endif

	    <!--priority list type-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="role">Priority Level :</label>
			  <select name="priority_id" class="form-control">

			  	@foreach(Modules\Ticket\Entities\Priority::active()->get() as $val)
			  		<option value="{{ $val->id }}"  @if(isset($ticket) && $ticket->priority_id == $val->id) selected @endif>{{ $val->name }}</option>
			  	@endforeach
			  </select>
	    	</div>
	    </div>

	    <!--subject-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="subject">Subject :</label>
			  <input type="text" class="form-control" name="subject" value="@if(isset($ticket)){{ old('subject', $ticket->subject) }}@endif" placeholder="Subject">
	    	</div>
	    </div>

	    <!--message-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="message">Message :</label>
			   <textarea rows="4" class="form-control" name="message" placeholder="Message" >@if(isset($ticket)){{ old('message', $ticket->message )}}@endif</textarea>
	    	</div>
	    </div>

	     <!--fileupload type-->
	    @if(isset($ticket->attachments))
	    <!--message-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
				  <div class="attachment-container">
	                <p>({{ count($ticket->attachments)}}) Attachments</p>
	                @foreach($ticket->attachments as $attachment)
	                    <div class="attachment-item pull-left">
	                        <a href="{{ asset($attachment->path) }}" target="_blank" class="attachment-link" alt="{{ $attachment->name }}" title="{{ $attachment->name }}" >{!! $attachment->displayAttachmentPreview() !!}</a>
	                    </div>
	                @endforeach
	            </div>
	    	</div>
	    </div>
	    @endif
	    
	     <!--fileupload-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9 fileupload-container well input-group" style="padding: 20px;" >
			 <label for="files">Select Attachments</label><a href="javascript:void(0)" class="add-fileupload" >Add attachments</a>
		    	<div class="fileupload-wrap">
		    		<input type="file" name="fileupload[]" class="fileupload" style="margin-bottom:5px" />
		    	</div>
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


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
  selector: 'textarea',
  height: 200,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});
</script>


