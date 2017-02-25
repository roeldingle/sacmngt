@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Jobs'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Job Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Job Management',
        'url' => '/job',
      ],
      [
      'title' => $job->name,
      'url' => '/job',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span6">
        
        @include('job::partials.profile-card')
        
    </div>
  </div>
    
@stop