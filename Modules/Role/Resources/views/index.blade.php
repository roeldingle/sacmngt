@extends('layouts.master')


@section('content')
	<!--main header part-->
    @include('layouts.navigation')
    @include('layouts.subnavigation')
    <!--//main header part-->

    <!--main content part-->
    <div class="container-fluid" id="main">
       <div class="row">
          @include('layouts.left-profile')
          <!--center-->
        	<div class="col-sm-9 col-md-9">
              @include('layouts.alert')
              	<!--panel-->
                <div class="panel panel-default">
                  <!--panel header (pass title, create_btn is display Create new button)-->
	                @include('role::layouts.header', ['title' => 'Role List', 'create_btn' => true]) 
                  <!--//panel header-->
                   <!--panel body-->
                  @include('role::layouts.table')
                  <!--//panel body-->
                  <!--panel footer-->
                  
                <!--//panel footer-->
                  
                </div>
                <!--//panel-->
          </div>
          <!--/center-->
      </div>
      <!--/row-->

      <!--main footer part-->
      @include('layouts.footer')
      <!--/main footer part-->

    </div>
    <!--/main content part-->
@stop