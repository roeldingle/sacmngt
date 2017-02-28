    <!--fname-->
    <div class="control-group">
      {!! Form::label('emp_id', 'Employee #:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::text('emp_id', isset($user) ? $user->emp_id : null , ['class' => 'span4']) !!}

        @if($errors->has('emp_id'))
          <span class="error">{{ $errors->first('emp_id') }}</span>
        @endif

      </div>
    </div>
    <!--end fname-->

    <!--email-->
    <div class="control-group">
      {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
      <div class="controls">

        @if(isset($process) &&  $process == 'edit')
        <strong>{{ $user->email }}</strong>
        <input type="hidden" name="email" value="{{ $user->email }}">
        @else
        {!! Form::text('email', null, ['class' => 'span4']) !!}
        @endif

        @if($errors->has('email'))
          <span class="error">{{ $errors->first('email') }}</span>
        @endif
      </div>
    </div>
    <!--end email-->


    <!--role-->
    <div class="control-group">
      {!! Form::label('role_id', 'Role:', ['class' => 'control-label']) !!}
      <div class="controls">
      {!! Form::select('role_id', $roles, null) !!}
  
      @if($errors->has('role_id'))
        <span class="error">{{ $errors->first('role_id') }}</span>
      @endif
      
      </div>
    </div>
    <!--end role-->

    <!--team-->
    <div class="control-group">
      {!! Form::label('team_id', 'Team:', ['class' => 'control-label']) !!}
      <div class="controls">
      

      <select name="team_id" @if(!isset($choosen_department_id) OR $choosen_department_id == 0) disabled  @endif >
        <option value="0">--Select option--</option>
      @foreach($teams as $team)
        <option value="{{ $team->id }}" @if(isset($user) && isset($user->meta->team_id) && $user->meta->team_id == $team->id) selected  @endif >
          {{ $team->name }}
        </option>
      @endforeach
      </select>


      @if($errors->has('job_id'))
        <span class="error">{{ $errors->first('job_id') }}</span>
      @endif
      
      </div>
    </div>
    <!--end team-->

    <!--jobs-->
    <div class="control-group">
      {!! Form::label('job_id', 'Position:', ['class' => 'control-label']) !!}
      <div class="controls">
      

      <select name="job_id" @if(!isset($choosen_department_id) OR $choosen_department_id == 0) disabled  @endif >
        <option value="0">--Select option--</option>
      @foreach($jobs as $job)
        <option value="{{ $job->id }}" @if(isset($user) && isset($user->meta->job_id) && $user->meta->job_id == $job->id) selected  @endif >
          {{ $job->name }}
        </option>
      @endforeach
      </select>


      @if($errors->has('job_id'))
        <span class="error">{{ $errors->first('job_id') }}</span>
      @endif
      
      </div>
    </div>
    <!--end jobs-->

    

   
    <!--fname-->
    <div class="control-group">
      {!! Form::label('fname', 'First Name:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::text('fname', (isset($user) && isset($user->meta)) ? $user->meta->fname : null , ['class' => 'span4']) !!}

        @if($errors->has('fname'))
          <span class="error">{{ $errors->first('fname') }}</span>
        @endif

      </div>
    </div>
    <!--end fname-->

    <!--mname-->
    <div class="control-group">
      {!! Form::label('mname', 'Middle Name:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::text('mname', (isset($user) && isset($user->meta)) ? $user->meta->mname : null, ['class' => 'span4']) !!}

        @if($errors->has('mname'))
          <span class="error">{{ $errors->first('mname') }}</span>
        @endif

      </div>
    </div>
    <!--end mname-->

    <!--lname-->
    <div class="control-group">
      {!! Form::label('lname', 'Last Name:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::text('lname', (isset($user) && isset($user->meta)) ? $user->meta->lname : null, ['class' => 'span4']) !!}

      </div>
    </div>
    <!--end lname-->

    <!--address-->
    <div class="control-group">
      {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::textarea('address', (isset($user) && isset($user->meta)) ? $user->meta->address : null, ['class' => 'span4', 'size' => '3x3']) !!}

        @if($errors->has('address'))
          <span class="error">{{ $errors->first('address') }}</span>
        @endif
      </div>
    </div>
    <!--end address-->

    <!--contact-->
    <div class="control-group">
      {!! Form::label('contact', 'Contact #:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::text('contact', (isset($user) && isset($user->meta)) ? $user->meta->contact : null, ['class' => 'span4']) !!}

        @if($errors->has('contact'))
          <span class="error">{{ $errors->first('contact') }}</span>
        @endif
      </div>
    </div>
    <!--end contact-->

    <!--date hired-->
    <div class="control-group">
      {!! Form::label('date_hired', 'Date Hired:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::date('date_hired', (isset($user) && isset($user->meta)) ? $user->meta->date_hired : null, ['class' => 'span4']) !!}

        @if($errors->has('date_hired'))
          <span class="error">{{ $errors->first('date_hired') }}</span>
        @endif
      </div>
    </div>
    <!--end contact-->


    <!--avatar url-->
    <div class="control-group">
      {!! Form::label('avatar', 'Avatar url:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::text('avatar', (isset($user) && isset($user->meta)) ? $user->meta->avatar : null, ['class' => 'span4']) !!}

        @if($errors->has('avatar'))
          <span class="error">{{ $errors->first('avatar') }}</span>
        @endif
      </div>
    </div>
    <!--end avatar-->


    <div class="form-actions">
      <button type="submit" class="btn btn-success">Save</button>
    </div>