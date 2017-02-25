    <!--hidden value of-->
    <input name="department_id" type="hidden" value="{{ isset($choosen_department_id) ? $choosen_department_id : '' }}">

    <!--name-->
    <div class="control-group">
      {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
      <div class="controls">
        @if(isset($choosen_department_id) && $choosen_department_id != null)
        {!! Form::text('name', isset($job) ? $job->name : null, ['class' => 'span4']) !!}
        @else
        {!! Form::text('name', isset($job) ? $job->name : null, ['class' => 'span4', 'disabled' => 'disabled']) !!}
        @endif
        
        @if($errors->has('name'))
          <span class="error">{{ $errors->first('name') }}</span>
        @endif
      </div>
    </div>
    <!--end name-->

    <!--description-->
    <div class="control-group">
      {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
      <div class="controls">

        @if(isset($choosen_department_id) && $choosen_department_id != null)
        {!! Form::textarea('description', isset($job) ? $job->description : null, ['class' => 'span4', 'size' => '3x3']) !!}
        @else
        {!! Form::textarea('description', isset($job) ? $job->description : null, ['class' => 'span4', 'size' => '3x3' , 'disabled' => 'disabled']) !!}
        @endif
        

        @if($errors->has('description'))
          <span class="error">{{ $errors->first('description') }}</span>
        @endif
      </div>
    </div>
    <!--end description-->


   

    <div class="form-actions">
      <button type="submit" class="btn btn-success">Save</button>
    </div>