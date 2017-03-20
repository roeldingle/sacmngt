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
    
    <div class="row-fluid">

        @if($members == null)
        <div style="text-align:center;margin-bottom:20%">
          <h3>You haven't setup your team yet.</h3>
          <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit my Profile</a>
        </div>
        
        @else

          <!--team dashboard-->
          <div class="widget-box">
            <div class="widget-title bg_lg" style="background: #F8A51D;color:#fff">
              <h5 style="color:#fff">Team Dashboard</h5>
            </div>
            <div class="widget-content">
              <div class="row-fluid" style="margin-top:0">
                <div class="span3">
                  <div class="row-fluid" style="margin-top:0">
                    <div class="span3">
                      <img class="img-circle" src="https://cdn.scratch.mit.edu/static/site/users/avatars/352/9928.png"> 
                    </div>
                    <div class="span9" style="padding-left:5px;line-height:15px">
                      <h3 style="margin-top:0;margin-bottom:0">{{ $team->name }}</h3>
                      <p>{{ $team->description }}</p><br /><br />

                      <br>
                      <!--task-->
                      <div class="row">
                        <div class="span12">

                          <div class="widget-content nopadding updates">

                          @foreach(Modules\Myteam\Entities\Mytask::active()->where('assign_id', 0)->get() as $task)
                            <div class="new-update clearfix">
                                  <i class="icon-calendar"></i>
                                    <small class="update-done">
                                      <strong>{{ $task->name }}</strong>
                                      <br />
                                      <span style="font-size:8px;color:#F66">{{ $task->start_at->format('M d, Y') }} to {{ $task->end_at->format('M d, Y') }}</span>
                                    </small>
                                    <br />
                              </div>
                            @endforeach

                         </div>
                        </div>
                      </div>
                      <!--end task-->
                      <br />

                      <a href="#" class="create-task btn btn-success pull-right">Add Task</a>
                    </div>
                    
                  </div>
                </div>
                <div class="span6"></div>
                <div class="span3">
                  <ul class="site-stats">
                    <li class="bg_lh"><i class="icon-user"></i> <strong>{{ count($members) }}</strong> <small>Total Members</small></li>
                    <li class="bg_lh"><i class="icon-plus"></i> <strong>{{ count(Modules\Myteam\Entities\Mytask::active()->whereIn('assign_id',[1,2,0,6,5])) }}</strong> <small>Task Assigned</small></li>
                    <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>Total Shop</small></li>
                    <li class="bg_lh"><i class="icon-tag"></i> <strong>9540</strong> <small>Total Orders</small></li>
                    <li class="bg_lh"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></li>
                    <li class="bg_lh"><i class="icon-globe"></i> <strong>8540</strong> <small>Online Orders</small></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!--end team dashboard-->

        
      </div>
      <div class="row-fluid">



          @foreach($members as $index=>$member)
          <div class="span3" @if(($index % 4) == 0)  style="margin-left:0px" @endif>
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
                      
                      @foreach(Modules\Myteam\Entities\Mytask::active()->where('assign_id', $member->id)->get() as $task)

                        <div class="new-update clearfix">
                              <i class="icon-calendar"></i>
                                <small class="update-done">
                                  <strong>{{ $task->name }}</strong>
                                  <br />
                                  <span style="font-size:8px;color:#F66">{{ $task->start_at->format('M d, Y') }} to {{ $task->end_at->format('M d, Y') }}</span>
                                </small>
                                <br />
                          </div>
                        @endforeach

                     </div>
                    </div>
                  </div>
                  <!--end task-->
                  
                </div>
        
            <!--end widget box-->
            </div>
            </div>
        </div>

        @if(($index % 3) == 0 && $index != 0)
        </div><div class="row-fluid">
        @endif

        
        @endforeach
      @endif

      <div id="add-task-form" style="display: none">
        <!-- <div class="row">
          <div class="span4"> -->
        {!! Form::open(['route' => 'myteam.add_task', 'class' => 'form-horizontal']) !!}

        <input type="hidden" name="team_id" value="{{ $team->id or '' }}">

        <!--member-->
        <div class="control-group">
        Assign to : <br />
        <select name="assign_id">
          <option value="0">Team {{$team->name or '---'}}</option>
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
              
         <!--name-->
          <div class="control-group">
            Name : <br />{!! Form::text('name', null, ['class' => 'span4']) !!}
          </div>
          <!--end name-->
          <br />
          <!--start_at-->
          <div class="control-group">
            Date Start : <br />{!! Form::date('start_at', null, ['class' => 'span4']) !!}
          </div>
          <!--end start_at-->
          <!--end_at-->
          <div class="control-group">
            Date End : <br />{!! Form::date('end_at', null, ['class' => 'span4']) !!}
          </div>
          <!--end end_at-->

          <br />

          <div class="form-actions">
            <button type="submit" class="btn btn-success">Save</button>
          </div>

        {!! Form::close() !!}
       <!--  </div>
        </div> -->
    </div>
        
        
      
  </div>
@stop