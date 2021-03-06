<div class="panel-body" style="padding-top:0">
	@include('user::layouts.filter')
	{{ csrf_field() }}
	<table class="table table-striped table-bordered table-list">
	    <thead>
	      <tr>
	      	<th width="5%"><input type="checkbox" name="checkall" class="checkall"></th>
	      	<th width="5%">#</th>
	        <th>Firstname</th>
	        <th>Lastname</th>
	        <th>Email</th>
	        <th>Role</th>
	        <th idth="5%">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@if(count($users) <= 0)
	            <tr role="row"><td colspan="8" style="text-align:center">No results found</td></tr>
	          @else
	            @foreach($users as $index=>$row)
	             <tr>
			      	<td><input type="checkbox" name="check" class="check" value="{{ $row->id }}"></td>
			      	<td>{{ $loop->iteration }}</td>
			        <td>{{ $row->setMeta()->fname }}</td>
			        <td>{{ $row->setMeta()->lname }}</td>
			        <td>{{ $row->email }}</td>
			        <td>{{ $row->role->name }}</td>
			        <td class="" style="text-align:center">
			      	<a href="{{ route( 'user.show', ['id' => $row->id] ) }}"><i class="fa fa-window-maximize" aria-hidden="true"></i></a> |
	                  <a href="{{ route( 'user.edit', ['id' => $row->id] ) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
	                </td>
			      </tr>
	            @endforeach
	          @endif
	    </tbody>
	  </table>

	  <div>
	  	<button type="button" id="delete-btn" class="btn btn-sm btn-danger btn-delete">Delete item(s)</button>
	 </div>
 </div>