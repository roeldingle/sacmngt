<div class="panel-body" style="padding-top:0">
	
	{{ csrf_field() }}
	<table class="table table-striped table-bordered table-list">
	    <thead>
	      <tr>
	      	<th width="2%"><input type="checkbox" name="checkall" class="checkall"></th>
	      	<th width="3%">#</th>
	        <th>Priority</th>
	        <th>Ticket Code</th>
	        <th width="30%">Subject</th>
	        <th>Status</th>
	        <th>Created</th>
	        <th>Last activity</th>
	        <th idth="5%">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@if(count($tickets) <= 0)
	            <tr role="row"><td colspan="10" style="text-align:center">No results found</td></tr>
	          @else
	            @foreach($tickets as $index=>$row)
	             <tr>
			      	<td><input type="checkbox" name="check" class="check" value="{{ $row->id }}"></td>
			      	<td>{{ $loop->iteration }}</td>
			      	<td>{{ $row->priority->name }}</td>
			      	<td>{{ $row->code }}</td>
			        <td>{{ $row->subject }}</td>
			        <td>{{ $row->status->name }}</td>
			        <td>{{ Carbon\Carbon::parse($row->created_at)->format('m/d/Y') }}</td>
			        <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
			        <td class="" style="text-align:center">
			      	<a href="{{ route( 'ticket.show', ['id' => $row->code] ) }}"><i class="fa fa-window-maximize" aria-hidden="true"></i></a> |
	                  <a href="{{ route( 'ticket.edit', ['id' => $row->code] ) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
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