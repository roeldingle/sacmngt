@extends('main.two-column-master')

<!--main header part-->
@include('main.navigation')
@include('main.subnavigation')
<!--//main header part-->

<!--left part contains profile-->
@section('content-left')
  @include('main.left-profile')
@stop
<!--//left part contains profile-->

<!--center part contains main content-->
@section('content-center')
  @include('main.alert')
  <!--panel-->
  <div class="panel panel-default">
    <!--panel header (pass title, create_btn is display Create new button)-->
    @include('role::layouts.header', ['title' => 'Role List', 'create_btn' => true]) 
    <!--//panel header-->
     <!--panel body-->
    @include('role::layouts.table')
    <!--//panel body-->
    <!--panel footer-->
    @include('role::layouts.footer')
  <!--//panel footer-->
    
  </div>
  <!--//panel-->
@stop
<!--//center part contains main content-->