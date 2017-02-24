@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Departments'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Department Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Department Management',
        'url' => '/department',
      ],
      [
      'title' => $department->name,
      'url' => '/department',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span6">
        
        @include('department::partials.profile-card')
        
    </div>
  </div>
    
@stop