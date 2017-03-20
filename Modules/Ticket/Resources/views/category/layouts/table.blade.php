<div class="panel-body" style="padding-top:0">
	
	{{ csrf_field() }}
	<table class="table table-striped table-bordered table-list">
	    <thead>
	      <tr>
	      	<!--show checkbox to delete if superadmin only-->
	      	@if(Auth::user()->role->id <= 2)
	      	<th width="2%"><input type="checkbox" name="checkall" class="checkall"></th>
	      	@endif
	      	<th width="3%">#</th>
	        <th>Name</th>
	        <th>Description</th>
	        <th>Severity</th>
	        <th idth="5%">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	            
	        @forelse($category as $index=>$row)
	           <tr role="row">
	           		@if(Auth::user()->role->id <= 2)
			      	<td><input type="checkbox" name="check" class="check" value="{{ $row->id }}"></td>
			      	@endif
	           		<td>{{ $loop->iteration }}</td>
	           		<td>{{ $row->name }}</td>
	           		<td>{{ $row->description }}</td>
	           		<td>{{ $row->severity_level }}</td>
	           		<td class="" style="text-align:center">
	                  	<a href="{{ route( 'ticket-category.edit', ['id' => $row->id] ) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
	                </td>
	           </tr>
	        @empty
	          <tr role="row"><td colspan="10" style="text-align:center">No results found</td></tr>
	        @endforelse
	    </tbody>
	  </table>

	  <div>
	  	<button type="button" id="delete-btn" class="btn btn-sm btn-danger btn-delete">Delete item(s)</button>
	 </div>
 </div>