    <!--hidden value of-->
    <input name="department_id" type="hidden" value="{{ isset($choosen_department_id) ? $choosen_department_id : '' }}">

    <!--name-->
    <div class="control-group">
      {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
      <div class="controls">
        @if(isset($choosen_department_id) && $choosen_department_id != null)
        {!! Form::text('name', isset($team) ? $team->name : null, ['class' => 'span4']) !!}
        @else
        {!! Form::text('name', isset($team) ? $team->name : null, ['class' => 'span4', 'disabled' => 'disabled']) !!}
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
        {!! Form::textarea('description', isset($team) ? $team->description : null, ['class' => 'span4', 'size' => '3x3']) !!}
        @else
        {!! Form::textarea('description', isset($team) ? $team->description : null, ['class' => 'span4', 'size' => '3x3' , 'disabled' => 'disabled']) !!}
        @endif
        

        @if($errors->has('description'))
          <span class="error">{{ $errors->first('description') }}</span>
        @endif
      </div>
    </div>
    <!--end description-->

    <div class="control-group">
      {!! Form::label('leader_id', 'Leader:', ['class' => 'control-label']) !!}
      <div class="controls">
      

      <select name="leader_id" @if(!isset($choosen_department_id) OR $choosen_department_id == 0) disabled  @endif >
        <option value="0">--Select option--</option>
      @foreach($leaders as $leader)
        <option value="{{ $leader->id }}" @if(isset($team) && $team->leader_id == $leader->id) selected  @endif >
          {{ $leader->meta->fname }} {{ $leader->meta->lname }}
        </option>
      @endforeach
      </select>


      @if($errors->has('leader_id'))
        <span class="error">{{ $errors->first('leader_id') }}</span>
      @endif
      
      </div>
    </div>

   

    <div class="form-actions">
      <button type="submit" class="btn btn-success">Save</button>
    </div>