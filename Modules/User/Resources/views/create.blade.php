@extends('main.main')

@section('content')
<hr>
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add New User</h5>
          </div>
          <div class="widget-content nopadding">

            {!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal']) !!}
              
              <div class="control-group">
                {!! Form::label('role_id', 'Role:', ['class' => 'control-label']) !!}
                <div class="controls">
                {!! Form::select('role_id', $roles, null) !!}
                </div>
              </div>

              <!--email-->
              <div class="control-group">
                {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::text('email', null , ['class' => 'span4']) !!}
                </div>
              </div>
              <!--end email-->

              <!--fname-->
              <div class="control-group">
                {!! Form::label('fname', 'First Name:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::text('fname', null , ['class' => 'span4']) !!}
                </div>
              </div>
              <!--end fname-->

              <!--mname-->
              <div class="control-group">
                {!! Form::label('mname', 'Middle Name:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::text('mname', null , ['class' => 'span4']) !!}
                </div>
              </div>
              <!--end mname-->

              <!--lname-->
              <div class="control-group">
                {!! Form::label('lname', 'Last Name:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::text('lname', null , ['class' => 'span4']) !!}
                </div>
              </div>
              <!--end lname-->

              <!--addres-->
              <div class="control-group">
                {!! Form::label('addres', 'Address:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::textarea('addres', null, ['class' => 'span4', 'size' => '3x3']) !!}
                </div>
              </div>
              <!--end addres-->

              <!--contact-->
              <div class="control-group">
                {!! Form::label('contact', 'Contact #:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::text('contact', null , ['class' => 'span4']) !!}
                </div>
              </div>
              <!--end contact-->

              <!--avatar url-->
              <div class="control-group">
                {!! Form::label('avatar', 'Avatar url:', ['class' => 'control-label']) !!}
                <div class="controls">
                  {!! Form::text('avatar', null , ['class' => 'span4']) !!}
                </div>
              </div>
              <!--end lname-->


            {!! Form::close() !!}

          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
@stop