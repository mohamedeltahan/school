<div class="form-group{{ $errors->has('file_name') ? 'has-error' : ''}}">
    {!! Form::label('file_name', 'File Name', ['class' => 'control-label']) !!}
    {!! Form::text('file_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('file_directory') ? 'has-error' : ''}}">
    {!! Form::label('file_directory', 'File Directory', ['class' => 'control-label']) !!}
    {!! Form::text('file_directory', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('file_directory', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('teacher_ssn') ? 'has-error' : ''}}">
    {!! Form::label('teacher_ssn', 'Teacher Ssn', ['class' => 'control-label']) !!}
    {!! Form::text('teacher_ssn', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('teacher_ssn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('level') ? 'has-error' : ''}}">
    {!! Form::label('level', 'Level', ['class' => 'control-label']) !!}
    {!! Form::number('level', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('subject') ? 'has-error' : ''}}">
    {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
    {!! Form::text('subject', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('semester') ? 'has-error' : ''}}">
    {!! Form::label('semester', 'Semester', ['class' => 'control-label']) !!}
    {!! Form::text('semester', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('semester', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('lesson') ? 'has-error' : ''}}">
    {!! Form::label('lesson', 'Lesson', ['class' => 'control-label']) !!}
    {!! Form::text('lesson', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('lesson', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('unit') ? 'has-error' : ''}}">
    {!! Form::label('unit', 'Unit', ['class' => 'control-label']) !!}
    {!! Form::text('unit', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('unit', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
