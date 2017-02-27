@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Roles'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Role Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Roles Management',
        'url' => '/role',
      ],
      [
      'title' => 'Add New Role',
      'url' => '/role/create',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Add New Role</h5>
            <a href="{{ route('role.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to Role List</a>
          </div>
          <div class="widget-content nopadding">

            {!! Form::open(['route' => 'role.store', 'class' => 'form-horizontal']) !!}
              
             @include('role::partials.form')

            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop