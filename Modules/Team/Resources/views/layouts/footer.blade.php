<div class="panel-footer">
	<div class="row">
	  <div class="col col-xs-4">
	  	<p>{{ $teams->total() }} result(s)</p>
	  	Page {{ $teams->currentPage() }} of {{ $teams->lastPage() }}
	  </div>
	  <div class="col col-xs-8" style="text-align:right">
	    {!! $teams->appends(['search_param' => $search['search_param'], 'search' => $search['search'] ])->links() !!}
	  </div>
	</div>
</div>