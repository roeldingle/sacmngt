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
    @include('ticket::category.layouts.header', ['title' => 'Support Category', 'create_btn' => true]) 
    <!--//panel header-->
     <!--panel body-->
    @include('ticket::category.layouts.table')
    <!--//panel body-->
    <!--panel footer-->
    @include('ticket::category.layouts.footer')
  <!--//panel footer-->
    
  </div>
  <!--//panel-->
@stop
<!--//center part contains main content-->