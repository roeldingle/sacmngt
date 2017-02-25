@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Jobs'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Job Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Job Management',
        'url' => '/job',
      ],
      [
      'title' => 'Edit Job',
      'url' => '/job',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Job</h5>
            <a href="{{ route('job.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to Job List</a>
          </div>
          <div class="widget-content nopadding">

            

            {!! Form::model($job, ['route' => array('job.update', $job->id),'class' => 'form-horizontal']) !!}

              <div class="control-group">
                <label class="control-label" for="">Department:</label>
                <div class="controls">
                <strong>{{ $job->department->name }}</strong>
                </div>
              </div>
              
              @include('job::partials.form')

            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop