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
      'title' => 'Edit Department',
      'url' => '/department',
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
            <a href="{{ route('department.index') }}" class="btn btn-warning btn-mini pull-right" style="margin:10px"><i class="icon-arrow-left"></i> Back to Department List</a>
          </div>
          <div class="widget-content nopadding">

            {!! Form::model($department, ['route' => array('department.update', $department->id),'class' => 'form-horizontal']) !!}
              
              @include('department::partials.form')

            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop