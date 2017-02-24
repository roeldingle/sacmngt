@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Role'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Role Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Role Management',
        'url' => '/role',
      ],
      [
      'title' => $role->name,
      'url' => '/role',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span6">
        
        @include('role::partials.profile-card')
        
    </div>
  </div>
    
@stop