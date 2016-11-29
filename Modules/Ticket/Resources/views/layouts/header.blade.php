<div class="panel-heading">
	<h3>
		{{ $title }}
		@if(isset($create_btn))
		<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('ticket.create') }}">Create New</a>
		@else
		<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('ticket.index') }}"> << Back to list</a>
		@endif

	</h3>
</div>