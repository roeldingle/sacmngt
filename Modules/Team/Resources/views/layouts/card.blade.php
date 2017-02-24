<!--panel body-->
<div class="panel-body" style="padding-top:0">

  <!--main-->
	<div class="">
		<div class="row">
			<!--row_count_container-->
			<div class="col-sm-10">


            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        
                        <div class="col-sm-6 col-md-8">
                            <h5>
                            	{{ $team->name }}
                            </h5>
                            <p>
                              {{ $team->description }}
                            </p>
                        	<a href="{{ route( 'team.edit', ['id' => $team->id] ) }}" class="btn-xs btn-primary puull-left">Edit</a> 
                        </div>
                    </div>
                </div>
            </div>

			</div>

		</div>
	</div>
	<!--//main-->

</div>

<!--/panel body-->