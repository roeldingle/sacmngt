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
    
    <!--department-->
    <div class="control-group">
      {!! Form::label('department_id', 'Department:', ['class' => 'control-label']) !!}
      <div class="controls">
      {!! Form::select('department_id', $departments,  (isset($user)) ? $user->department_id : null ) !!}


      @if($errors->has('department_id'))
        <span class="error">{{ $errors->first('department_id') }}</span>
      @endif
      
      </div>
    </div>
    <!--end department-->

      <!--email-->
    <div class="control-group">
      {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::text('email', null, ['class' => 'span4']) !!}

        @if($errors->has('email'))
          <span class="error">{{ $errors->first('email') }}</span>
        @endif
      </div>
    </div>
    <!--end email-->

   

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