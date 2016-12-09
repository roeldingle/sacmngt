<div class="panel-footer">
	<div class="row">
	  <div class="col col-xs-4">
	  	<p>{{ $tickets->total() }} result(s)</p>
	  	Page {{ $tickets->currentPage() }} of {{ $tickets->lastPage() }}
	  </div>
	  <div class="col col-xs-8" style="text-align:right">
	    {!! $tickets->appends(['search_param' => $search['search_param'], 'search' => $search['search'] ])->links() !!}
	  </div>
	</div>
</div>