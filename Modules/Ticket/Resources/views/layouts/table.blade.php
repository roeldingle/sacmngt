<div class="panel-body" style="padding-top:0">
	
	{{ csrf_field() }}
	<table class="table table-striped table-bordered table-list">
	    <thead>
	      <tr>
	      	<!--show checkbox to delete if superadmin only-->
	      	@if(Auth::user()->role->id == 1)
	      	<th width="2%"><input type="checkbox" name="checkall" class="checkall"></th>
	      	@endif
	      	<th width="3%">#</th>
	      	<th>Ticket Code</th>
	        <th>Category</th>
	        
	        @if(Auth::user()->role->id != 4)
	        <th>Owner</th>
	        @endif
	        <th width="25%">Subject</th>
	        <th>Status</th>
	        <th>Created</th>
	        <th>Last activity</th>
	        
	        <!-- <th>Acknowledge by</th> -->
	        <!-- action to edit n view
	        <th idth="5%">Action</th>
	    	-->
	      </tr>
	    </thead>
	    <tbody>
	    	@if(count($tickets) <= 0)
	            <tr role="row"><td colspan="10" style="text-align:center">No results found</td></tr>
	          @else
	            @foreach($tickets as $index=>$row)
	             <tr>
	             	<!--show checkbox to delete if superadmin only-->
	             	@if(Auth::user()->role->id == 1)
			      	<td><input type="checkbox" name="check" class="check" value="{{ $row->id }}"></td>
			      	@endif
			      	<td>{{ $loop->iteration }}</td>
			      	
			      	<td>
			      		@if(Auth::user()->role->id == 4)
			      		<a href="{{ route( 'ticket.show', ['id' => $row->code] ) }}">{{ $row->code }}</a>
			      		@else
			      		<a href="{{ route( 'support.show', ['id' => $row->code] ) }}">{{ $row->code }}</a>
			      		@endif
			      	</td>
			      	<td>{{ $row->category->name }}</td>
			      	@if(Auth::user()->role->id != 4)
			        <td>
			        	<a href="{{ route( 'user.show', ['id' => $row->user_id] ) }}">
			        	{{ $row->user->setMeta()->fname }} {{ $row->user->setMeta()->lname }}
			        	</a>
			        </td>
			        @endif
			        <td>
			        	@if(Auth::user()->role->id == 4)
			      		<a href="{{ route( 'ticket.show', ['id' => $row->code] ) }}">{{ $row->subject }}</a>
			      		@else
			      		<a href="{{ route( 'support.show', ['id' => $row->code] ) }}">{{ $row->subject }}</a>
			      		@endif
			        </td>
			        <td>
			        	<span class="label label-{{$row->status->label_class}} }}"> {{ $row->status->name }} </span>
				    </td>
			        <td>{{ Carbon\Carbon::parse($row->created_at)->format('m/d/Y g:i A') }}</td>
			        <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
			       <!--  <td>
			        	@if($row->staff_filed !== 0)
				        	<a href="{{ route( 'user.show', ['id' => $row->staff_filed] ) }}" target="_blank">
				        	{{ $row->attendedBy()  }}
				        	</a>
			        	@else
			        		----
			        	@endif
			        </td> -->
			      </tr>


	            @endforeach
	          @endif
	    </tbody>
	  </table>

	  <div>
	  	<button type="button" id="delete-btn" class="btn btn-sm btn-danger btn-delete">Delete item(s)</button>
	 </div>
 </div>