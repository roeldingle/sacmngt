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

              {!! Form::open(['method' => 'GET', 'route' => 'user.create','class' => 'form-horizontal']) !!}
              <div class="control-group">
                {!! Form::label('department_id', 'Department:', ['class' => 'control-label']) !!}
                <div class="controls">

                   <select name="department_id" onchange ="this.form.submit()" >
                      <option value="0">--Select option--</option>
                    @foreach($departments as $department)
                      <option value="{{ $department->id }}" @if(isset($choosen_department_id) && $choosen_department_id == $department->id) selected  @endif >
                        {{ $department->name}}
                      </option>
                    @endforeach
                    </select>

                @if($errors->has('department_id'))
                  <span class="error">{{ $errors->first('department_id') }}</span>
                @endif
                </div>
              </div>
            {!! Form::close() !!}

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