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
                        <div class="col-sm-6 col-md-4">
                            <img src="{{ $user->setMeta()->avatar }}" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h5>
                            	{{ $user->setMeta()->fname }} {{ $user->setMeta()->lname }} ({{ $user->role->name }})
                            	<small>{{ $user->setMeta()->email }}</small>
                            </h5>
                            
                        	<a href="{{ route( 'user.edit', ['id' => $user->id] ) }}" class="btn-xs btn-primary puull-left">Edit User</a> 
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