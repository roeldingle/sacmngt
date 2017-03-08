@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'My Team', 'sub' => 'Team'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Team Dashboard', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Team Dashboard',
        'url' => '/team',
      ]
    ]
  ])
@stop

@section('content')

    <a href="#" class="create-task btn btn-success">Add Task</a>
    <div class="row-fluid">

        @if($members == null)
        <div style="text-align:center;margin-bottom:20%">
          <h3>You haven't setup your team yet.</h3>
          <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit my Profile</a>

        </div>
        
        
        @else

          <!--team events-->
          <div class="span3">
            <!--end widget box-->
            <div class="widget-box">
              <div class="widget-title" style="background: #F8A51D;"> 
                <h5 style="color:#fff">Team Events</h5>
              </div>
              <div class="widget-content">
                <div class="container-fluid">

                  <div class="row">
                    <div class="span3">
                      <img class="img-circle" src="https://cdn.scratch.mit.edu/static/site/users/avatars/352/9928.png"> 
                    </div>
                    <div class="span9" style="padding-left:5px;line-height:15px">
                      <strong>{{ $team->name }}</strong><br />
                      <small>{{ $team->description }}</small>
                    </div>
                  </div>
                  <br>
                  <!--task-->
                  <div class="row">
                    <div class="span12">

                      <div class="widget-content nopadding updates">

                      <div class="new-update clearfix">
                          <i class="icon-star"></i>
                            <small class="update-done">
                              <strong>Daily Team Huddle Monday to Thursday @9am</strong>
                              <br />
                              <span style="font-size:8px;color:#F66">Always</span>
                            </small>
                            <br />
                      </div>

                      <div class="new-update clearfix">
                          <i class="icon-star"></i>
                            <small class="update-done">
                              <strong>Weekly Level 10 one on one every Friday</strong>
                              <br />
                              <span style="font-size:8px;color:#F66">Always</span>
                            </small>
                            <br />
                      </div>

                      <div class="new-update clearfix">
                          <i class="icon-calendar"></i>
                            <small class="update-done">
                              <strong>Revalida exam Q1</strong>
                              <br />
                              <span style="font-size:8px;color:#F66">Jan 11 (Wed) to Jan 13 (Fri)</span>
                            </small>
                            <br />
                      </div>

                      <div class="new-update clearfix">
                          <i class="icon-glass"></i>
                            <small class="update-done">
                              <strong>Team Activity for Q1</strong>
                              <br />
                              <span style="font-size:8px;color:#F66">Jan 11 (Wed) to Jan 13 (Fri)</span>
                            </small>
                            <br />
                      </div>


                      <div class="new-update clearfix">
                          <i class="icon-gift"></i>
                            <small class="update-done">
                              <strong>Happy Birthday Master Roy :)</strong>
                              <br />
                              <span style="font-size:8px;color:#F66">Jan 13 (Fri)</span>
                            </small>
                            <br />
                      </div>


                     </div>
                    </div>
                  </div>
                  <!--end task-->

                  
                </div>
        
            <!--end widget box-->
            </div>
            </div>
        </div>
          <!--end team events-->



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
                      <img class="img-circle" src="{{ $member->avatar }}" style="min-height:50px"> 
                    </div>
                    <div class="span9" style="padding-left:5px;line-height:15px">
                      <strong>{{ $member->fname or '---' }} {{ $member->lname or '---' }}</strong><br />
                      <small><i class="icon-envelope-alt"></i>&nbsp; {!! str_replace('@straightarrow.com.ph', '', Modules\User\Entities\User::findOrFail($member->user_id)->email) !!}</small><br />
                      <small><i class="icon-phone"></i>&nbsp; {{ $member->contact or '---' }}</small><br />
                    </div>
                  </div>

                  <br>
                  <!--task-->
                  <div class="row">
                    <div class="span12">

                      <div class="widget-content nopadding updates">
                      <div class="new-update clearfix"><i class="icon-gift"></i>
                        <small class="update-done"><strong>Happy Birthday Roy!</strong></small>
                        <div class="update-date"><span class="update-day">20</span>Jan</div>
                      </div>

                      <div class="new-update clearfix"><i class="icon-gift"></i>
                        <small class="update-done"><strong>Happy Birthday Roy!</strong></small>
                        <div class="update-date"><span class="update-day">20</span>Jan</div>
                      </div>

                     </div>
                    </div>
                  </div>
                  <!--end task-->

                  
                </div>
        
            <!--end widget box-->
            </div>
            </div>
        </div>
        @endforeach
      @endif

      <div id="add-task-form" style="display: none">
        <div class="row">
          <div class="span4">
        {!! Form::open(['route' => 'myteam.add_task', 'class' => 'form-horizontal']) !!}


        <!--member-->
        <div class="control-group">
        Assign to : <br />
        <select name="member_id">
          <option value="0">--Select option--</option>
          @if(count($members) > 0)
          @foreach($members as $member)
            <option value="{{ $member->id }}" >
              {{ $member->fname }} {{ $member->lname }} 
            </option>
          @endforeach
          @endif
        </select>
        </div>
        <br />
        <!--date_start-->
        <div class="control-group">
          Date Start : <br />{!! Form::date('date_start', null, ['class' => 'span4']) !!}
        </div>
        <!--date_start-->
        <br />
        <!--date_end-->
        <div class="control-group">
          Date End : <br />{!! Form::date('date_end', null, ['class' => 'span4']) !!}
        </div>
        <!--date_end-->
        <br />
              
         <!--name-->
          <div class="control-group">
            Name : <br />{!! Form::text('name', isset($team) ? $team->name : null, ['class' => 'span4']) !!}
          </div>
          <!--end name-->
          <br />
          <!--description-->
          <div class="control-group">
            Description : <br />{!! Form::text('description', isset($team) ? $team->name : null, ['class' => 'span4']) !!}
            
          </div>
          <!--end description-->
          <br />

          <div class="form-actions">
            <button type="submit" class="btn btn-success">Save</button>
          </div>

        {!! Form::close() !!}
        </div>
        </div>
    </div>
        
        
      
  </div>
@stop