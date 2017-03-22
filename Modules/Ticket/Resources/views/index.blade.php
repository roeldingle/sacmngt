@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'ITSupport', 'sub' => null])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'IT Support', 
  'breadcrumbs' => 
    [
      [ 'title' => 'IT Support',
        'url' => '/ticket/it',
      ]
    ]
  ])
@stop

@section('content')
    
  <div class="row-fluid">
    1
  </div>

  <div class="row-fluid">
    2
  </div>
@stop