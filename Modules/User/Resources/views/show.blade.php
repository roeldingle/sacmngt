@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Users'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'User Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'User Management',
        'url' => '/user',
      ],
      [
      'title' => (isset($user) && isset($user->meta) ) ? $user->meta->fname.' '.$user->meta->lname : $user->email,
      'url' => '/users',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span6">
        
        @include('user::partials.profile-card')
        
    </div>
  </div>
    
@stop