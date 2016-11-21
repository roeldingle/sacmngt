@extends('base::layouts.master')


@section('content')

    @include('base::layouts.navigation')
    <div class="clearfix"></div>
    @include('base::layouts.subnavigation')
    <!--main-->
    <div class="container-fluid" id="main">

       <div class="row">

          @include('base::layouts.left-profile')

          <!--center-->
        	<div class="col-sm-9 col-md-9">

              @include('base::layouts.alert')
            	 
              	<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Library</a></li>
				  <li class="active">Data</li>
				</ol>

                <div class="panel panel-default">
                  <div class="panel-heading">
	                <h3>View User</h3>
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
      
      @include('base::layouts.footer')
      
    </div><!--/main-->
@stop


