<div class="panel-heading">
	<h3>
		{{ $title }}
		@if(isset($create_btn))
		<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('department.create') }}">Create New</a>
		@else
		<a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('department.index') }}"> << Back to list</a>
		@endif

	</h3>
</div>