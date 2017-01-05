<div class="panel-footer">
	<div class="row">
	  <div class="col col-xs-4">
	  	<p>{{ $departments->total() }} result(s)</p>
	  	Page {{ $departments->currentPage() }} of {{ $departments->lastPage() }}
	  </div>
	  <div class="col col-xs-8" style="text-align:right">
	    {!! $departments->appends(['search_param' => $search['search_param'], 'search' => $search['search'] ])->links() !!}
	  </div>
	</div>
</div>