<div class="panel-body" style="padding-top:0">
	
	{{ csrf_field() }}
	<table class="table table-striped table-bordered table-list">
	    <thead>
	      <tr>
	      	<th width="5%"><input type="checkbox" name="checkall" class="checkall"></th>
	      	<th width="5%">#</th>
	        <th>Name</th>
	        <th>Description</th>
	        <th>Department</th>
	        <th>Team Leader/POC</th>
	        <th idth="5%">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@if(count($teams) <= 0)
	            <tr team="row"><td colspan="8" style="text-align:center">No results found</td></tr>
	          @else
	            @foreach($teams as $index=>$row)
	             <tr>
			      	<td><input type="checkbox" name="check" class="check" value="{{ $row->id }}"></td>
			      	<td>{{ $loop->iteration }}</td>
			        <td>{{ $row->name }}</td>
			        <td>{{ $row->description }}</td>
			        <td>{{ $row->department->name }}</td>
			        <td>
					@if($row->leader_id != null)
			        {{ $row->leader->setMeta()->fname }} {{ $row->leader->setMeta()->lname }}
					@else
						Not yet set
					@endif
			        <td class="" style="text-align:center">
			      		<a href="{{ route( 'team.show', ['id' => $row->id] ) }}"><i class="fa fa-window-maximize" aria-hidden="true"></i></a> |
	                  <a href="{{ route( 'team.edit', ['id' => $row->id] ) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
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