@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'My Team', 'sub' => 'Team'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'My Team', 
  'breadcrumbs' => 
    [
      [ 'title' => 'My Team',
        'url' => '/team',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      
        
        @foreach($members as $member)
        <div class="span3">
          <!--end widget box-->
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>{{ $member->fname or '---' }} {{ $member->lname or '---' }}</h5>
            </div>
            <div class="widget-content">
              <div class="container-fluid">

                <div class="row">
                  <div class="span3">
                    <img class="img-circle" src="{{ $member->avatar }}"> 
                  </div>
                  
                </div>

                <div class="row">
                  <div class="span3"></div>
                  <div class="span9" style="margin-top:10px">

                    

                  </div>
                </div>
                
              </div>
      
          <!--end widget box-->
          </div>
          </div>
      </div>
        @endforeach
        
        
      
  </div>
@stop