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
    @include('ticket::layouts.header', ['title' => 'View ticket'])
    <!--//panel header-->
    <!--panel body-->
     @include('ticket::layouts.card')
    <!--//panel body-->
    
  </div>
  <!--//panel-->
@stop
<!--//center part contains main content-->