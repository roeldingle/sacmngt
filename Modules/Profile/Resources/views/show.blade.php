@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'My Profile', 'sub' => 'Profile'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'My Profile', 
  'breadcrumbs' => 
    [
      [ 'title' => 'My Profile',
        'url' => '/profile',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span6">
        
        @include('profile::partials.profile-card')
        
    </div>
  </div>
    
@stop