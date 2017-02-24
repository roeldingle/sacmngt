@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Teams'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Team Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Team Management',
        'url' => '/team',
      ],
      [
      'title' => 'Add New Team',
      'url' => '/team/create',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Add New Team</h5>
            <a href="{{ route('team.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to Team List</a>
          </div>
          <div class="widget-content nopadding">
              
              {!! Form::open(['method' => 'GET', 'route' => 'team.create','class' => 'form-horizontal']) !!}
              <div class="control-group">
                {!! Form::label('department_id', 'Department:', ['class' => 'control-label']) !!}
                <div class="controls">
                {!! Form::select('department_id', $departments, $choosen_department_id, ['onchange' => 'this.form.submit()']) !!}

                @if($errors->has('department_id'))
                  <span class="error">{{ $errors->first('department_id') }}</span>
                @endif
                </div>
              </div>
            {!! Form::close() !!}

            {!! Form::open(['route' => 'team.store', 'class' => 'form-horizontal']) !!}
              
             @include('team::partials.form')

            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop