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
      'title' => $team->name,
      'url' => '/team',
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
            <a href="{{ route('team.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to Team List</a>
          </div>
          <div class="widget-content nopadding">

            

            {!! Form::model($team, ['route' => array('team.update', $team->id),'class' => 'form-horizontal']) !!}

              <div class="control-group">
                <label class="control-label" for="">Department:</label>
                <div class="controls">
                <strong>{{ $team->department->name }}</strong>
                </div>
              </div>
              
              @include('team::partials.form')

            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop