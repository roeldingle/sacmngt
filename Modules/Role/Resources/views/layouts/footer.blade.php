<div class="panel-footer">
	<div class="row">
	  <div class="col col-xs-4">
	  	<p>{{ $users->total() }} result(s)</p>
	  	Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
	  </div>
	  <div class="col col-xs-8" style="text-align:right">
	    {!! $users->appends(['search_param' => $search['search_param'], 'search' => $search['search'] ])->links() !!}
	  </div>
	</div>
</div>