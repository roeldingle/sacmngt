@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'My Profile', 'sub' => 'Edit Profile'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'My Profile', 
  'breadcrumbs' => 
    [
      [ 'title' => 'My Profile',
        'url' => '/profile',
      ],
      [ 'title' => 'Edit Profile',
        'url' => '/profile/edit',
      ],
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Profile</h5>
            <a href="{{ route('profile.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to My Profile</a>
          </div>
          <div class="widget-content nopadding">

            {!! Form::model($user, ['route' => array('profile.update', $user->id),'class' => 'form-horizontal']) !!}
              
              @include('profile::partials.form')

            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop