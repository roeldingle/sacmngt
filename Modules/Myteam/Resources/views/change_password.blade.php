@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'My Profile', 'sub' => 'Change Password'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Change Password', 
  'breadcrumbs' => 
    [
      [ 'title' => 'My Profile',
        'url' => '/profile',
      ],
      [ 'title' => 'Change Password',
        'url' => '/profile/change_password',
      ],
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
        
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Change Password</h5>
            <a href="{{ route('profile.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to Profile</a>
          </div>
          <div class="widget-content nopadding">

            {!! Form::open(['route' => 'profile.update_password', 'class' => 'form-horizontal']) !!}
              
              <!--current password-->
              <div class="control-group">
                {!! Form::label('current_password', 'Current Password:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::password('current_password', null, ['class' => 'span4']) !!}

                  @if($errors->has('current_password'))
                    <span class="error">{{ $errors->first('current_password') }}</span>
                  @endif
                </div>
              </div>
              <!--end current password-->

              <!--password-->
              <div class="control-group">
                {!! Form::label('password', 'New Password:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::password('password', null, ['class' => 'span4']) !!}

                  @if($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                  @endif
                </div>
              </div>
              <!--end password-->

              <!--confirm password-->
              <div class="control-group">
                {!! Form::label('password_confirmation', 'Password Confirm:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::password('password_confirmation', null, ['class' => 'span4']) !!}

                  @if($errors->has('password_confirmation'))
                    <span class="error">{{ $errors->first('password_confirmation') }}</span>
                  @endif
                </div>
              </div>
              <!--end confirm password-->


              <div class="form-actions">
                <a href="{{ route('profile.index') }}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
              </div>

            {!! Form::close() !!}

          </div>
        </div>
        
    </div>
  </div>
    
@stop