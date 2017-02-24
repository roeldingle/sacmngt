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
      'title' => 'Add New User',
      'url' => '/users/create',
      ]
    ]
  ])
@stop



@section('content')
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Add New User</h5>
            <a href="{{ route('user.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to User List</a>
          </div>
          <div class="widget-content nopadding">

            {!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal']) !!}
              
             @include('user::partials.form')

            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop