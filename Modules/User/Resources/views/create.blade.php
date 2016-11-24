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
                  <!--panel header-->
	                @include('user::layouts.header', ['title' => 'Create User'])
                  <!--//panel header-->
                  <!--panel body-->
          			@include('user::layouts.form')
                  <!--//panel body-->
                 
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