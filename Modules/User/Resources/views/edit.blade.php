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
      'title' => 'Edit User',
      'url' => '#',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit User</h5>
            <a href="{{ route('user.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to User List</a>
          </div>
          <div class="widget-content nopadding">

            {!! Form::model($user, ['route' => array('user.update', $user->id),'class' => 'form-horizontal']) !!}
              
              @include('user::partials.form')

            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop