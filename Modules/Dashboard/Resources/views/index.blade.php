@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Dashboard', 'sub' => ''])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Dashboard', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Dashboard',
        'url' => '/dashboard',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Dashboard</h5>
            </div>
          <div class="widget-content nopadding">
            
              Content here

            
          </div>
        </div>
        <!--end widget box-->
        
        </div>
      </div>
    </div>
  </div>
@stop