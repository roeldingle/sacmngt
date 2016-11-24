@extends('layouts.master')


@section('content')

    @include('layouts.navigation')
    <div class="clearfix"></div>
    @include('layouts.subnavigation')
    <!--main-->
    <div class="container-fluid" id="main">

       <div class="row">

          @include('layouts.left-profile')

          <!--center-->
        	<div class="col-sm-9 col-md-9">

              @include('layouts.alert')
            	 

                <div class="panel panel-default">
                  <div class="panel-heading">
	                <h3>View Role</h3>
                  </div>

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
                                    	{{ $role->name }}
                                    </h5>
                                    <p>
                                      {{ $role->description }}
                                    </p>
                                	<a href="{{ route( 'role.edit', ['id' => $role->id] ) }}" class="btn-xs btn-primary puull-left">Edit Role</a> 
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

                  <div class="panel-footer">
	                <div class="row">
	                  <div class="col col-xs-4">
	                  	
	                  <div class="col col-xs-8" style="text-align:right">
	                   
	                  </div>
	                </div>
	              </div>


                </div>
          </div>
          <!--/center-->

      </div><!--/row-->
      
      @include('layouts.footer')
      
    </div><!--/main-->
@stop


