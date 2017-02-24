@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Teams'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Team Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Team Management',
        'url' => '/team',
      ],
      [
      'title' => $team->name,
      'url' => '/team',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span6">
        
        @include('team::partials.profile-card')
        
    </div>
  </div>
    
@stop