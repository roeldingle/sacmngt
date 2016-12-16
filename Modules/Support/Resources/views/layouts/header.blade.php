<div class="panel-heading">
	<h3>
		{{ $title }}
		@if(isset($create_btn) && $create_btn)
		<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('support.create') }}">Create Unfiled Ticket</a>
		@elseif(isset($create_btn) && $create_btn == false)
		<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('support.index') }}"> << Back to list</a>
		@endif

	</h3>
</div>