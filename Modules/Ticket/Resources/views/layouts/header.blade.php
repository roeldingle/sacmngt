<div class="panel-heading">
	<h3>
		{{$title}}
		@if(isset($create_btn))

			@if(Request::segment('1') == 'ticket')
				<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('ticket.create') }}">Create New</a>
			@else
				<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('support.create') }}">Create Unfiled Ticket</a>
			@endif
		
		@else

			@if(Request::segment('1') == 'ticket')
				<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('ticket.index') }}"> << Back to list</a>
			@else
				<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('support.index') }}"> << Back to list</a>
			@endif
		@endif

	</h3>
</div>