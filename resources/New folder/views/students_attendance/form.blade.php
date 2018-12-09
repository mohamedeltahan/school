<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('report') ? 'has-error' : ''}}">
    {!! Form::label('report', 'Report', ['class' => 'control-label']) !!}
    {!! Form::text('report', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('report', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('file_attached_link') ? 'has-error' : ''}}">
    {!! Form::label('file_attached_link', 'File Attached Link', ['class' => 'control-label']) !!}
    {!! Form::text('file_attached_link', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('file_attached_link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('student_ssn') ? 'has-error' : ''}}">
    {!! Form::label('student_ssn', 'Student Ssn', ['class' => 'control-label']) !!}
    {!! Form::text('student_ssn', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('student_ssn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('absent_time') ? 'has-error' : ''}}">
    {!! Form::label('absent_time', 'Absent Time', ['class' => 'control-label']) !!}
    {!! Form::text('absent_time', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('absent_time', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
