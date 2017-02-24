<div class="control-group">
      
    <!--name-->
    <div class="control-group">
      {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
      <div class="controls">
        {!! Form::text('name', isset($department) ? $department->name : null, ['class' => 'span4']) !!}
        
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
        {!! Form::textarea('description', isset($department) ? $department->description : null, ['class' => 'span4', 'size' => '3x3']) !!}

        @if($errors->has('description'))
          <span class="error">{{ $errors->first('description') }}</span>
        @endif
      </div>
    </div>
    <!--end description-->

   

    <div class="form-actions">
      <button type="submit" class="btn btn-success">Save</button>
    </div>