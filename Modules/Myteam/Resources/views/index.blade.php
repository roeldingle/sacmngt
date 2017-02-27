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
            <div class="widget-title"> 
              <h5>{{ $member->job->description or '---' }}</h5>
            </div>
            <div class="widget-content">
              <div class="container-fluid">

                <div class="row">
                  <div class="span3">
                    <img class="img-circle" src="{{ $member->avatar }}"> 
                  </div>
                  <div class="span9" style="padding-left:5px;line-height:15px">
                    <strong>{{ $member->fname or '---' }} {{ $member->lname or '---' }}</strong>
                    <small>{{ Modules\User\Entities\User::findOrFail($member->user_id)->email }}</small>
                    <small>{{ $member->contact or '---' }}</small>
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