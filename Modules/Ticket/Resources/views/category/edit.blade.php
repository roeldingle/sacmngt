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
    <!--panel header-->
    @include('ticket::category.layouts.header', ['title' => 'Create category'])
    <!--//panel header-->
    <!--panel body-->
     @include('ticket::category.layouts.form')
    <!--//panel body-->
    
  </div>
  <!--//panel-->
@stop
<!--//center part contains main content-->