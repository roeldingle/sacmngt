<!--panel form-->
<div class="panel-body" style="padding-top:0">
	<!--form-->
	
	<form class="form-horizontal" enctype="multipart/form-data" ticket="form" action="@if(isset($category)) {{ route('ticket-category.update' , ['id' => $category->id ] ) }} @else {{ route('ticket-category.store') }} @endif" method="POST">

		<!--put this code for token-->
	    {{ csrf_field() }}


	    <!--name-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="name">Name :</label>
			  <input type="text" class="form-control" name="name" value="@if(isset($category)){{ old('name', $category->name) }}@endif" placeholder="Name">
	    	</div>
	    </div>

	    <!--description-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-9 col-md-9" style="padding-left: 0;">
			  <label for="name">Description :</label>
			  <input type="text" class="form-control" name="description" value="@if(isset($category)){{ old('description', $category->description) }}@endif" placeholder="Description">
	    	</div>
	    </div>

	    
	    <!--severity level list type-->
	    <div class="form-group">
	    	<div class="col-sm-1 col-md-1"></div>
	    	<div class="col-sm-3 col-md-3" style="padding-left: 0;">
			  <label for="role">Severity Level :</label>
			  <select name="severity_level" class="form-control">

			  	@for($counter = 1; $counter <= 5; $counter++)
			  		<option value="{{ $counter }}"  @if(isset($category) && $category->severity_level == $counter) selected @endif>{{ $counter }}</option>
			  	@endfor
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


