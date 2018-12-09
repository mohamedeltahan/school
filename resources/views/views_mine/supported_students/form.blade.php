<div class="form-group{{ $errors->has('investors_id') ? 'has-error' : ''}}">
    {!! Form::label('investors_id', 'Investors Id', ['class' => 'control-label']) !!}
    {!! Form::number('investors_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('investors_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('student_ssn') ? 'has-error' : ''}}">
    {!! Form::label('student_ssn', 'Student Ssn', ['class' => 'control-label']) !!}
    {!! Form::text('student_ssn', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('student_ssn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('support_lvl') ? 'has-error' : ''}}">
    {!! Form::label('support_lvl', 'Support Lvl', ['class' => 'control-label']) !!}
    {!! Form::number('support_lvl', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('support_lvl', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
