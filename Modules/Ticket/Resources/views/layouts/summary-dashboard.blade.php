<div class="panel  panel-default">
	<div class="panel-body" style="padding-top:0">

			<div class="row" style="padding:10px;text-align:center">

				<div class="col-md-3 col-sm-3">
			        <div class="panel panel-primary">
			            <div class="panel-body">
			            	<h3>{{$tickets->count()}}</h3>
			            	<p>Total</p>
			            </div>
			        </div>
		        </div>

				@forelse(Modules\Ticket\Entities\Status::active()->get() as $key=>$status)

				<div class="col-md-3 col-sm-3">
					<div class="panel panel-{{$status->label_class}}">
			            <div class="panel-body">
			            	<h3>{{$tickets->where('status_id',$status->id)->count()}}</h3>
			            	<p>{{ucwords($status->name)}}</p>
			            </div>
			        </div>

				</div>
				
				@empty

				@endforelse

			</div>

		
	</div>
</div>	
