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
  <!--panel body-->


  <!--panel-->
  <div class="panel panel-default">

    <div class="row" style="padding:10px;text-align:center">


        <div class="col-md-3 col-sm-3">
          <div class="panel panel-default">
                <div class="panel-body">

                  @foreach($tickets->groupBy('user_id') as $ticket)

                    <p>{{$ticket->first()->user->department->name}} {{$ticket->count()}}</p>

                  @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-3">
          <div class="panel panel-default">
                <div class="panel-body">
                  
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-3">
          <div class="panel panel-default">
                <div class="panel-body">
                  dfdfd
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-3">
          <div class="panel panel-default">
                <div class="panel-body">
                  dfdfd
                </div>
            </div>
        </div>
        
      </div>
    
  </div>
  <!--//panel-->
@stop
<!--//center part contains main content-->