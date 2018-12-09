<div class="form-group{{ $errors->has('full_name') ? 'has-error' : ''}}">
    {!! Form::label('full_name', 'Full Name', ['class' => 'control-label']) !!}
    {!! Form::text('full_name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('account_name') ? 'has-error' : ''}}">
    {!! Form::label('account_name', 'Account Name', ['class' => 'control-label']) !!}
    {!! Form::text('account_name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('account_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
    {!! Form::password('password', ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('user_category') ? 'has-error' : ''}}">
    {!! Form::label('user_category', 'User Category', ['class' => 'control-label']) !!}
    {!! Form::text('user_category', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('tracing_key') ? 'has-error' : ''}}">
    {!! Form::label('tracing_key', 'Tracing Key', ['class' => 'control-label']) !!}
    {!! Form::number('tracing_key', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('tracing_key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('ssn') ? 'has-error' : ''}}">
    {!! Form::label('ssn', 'Ssn', ['class' => 'control-label']) !!}
    {!! Form::text('ssn', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('ssn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('birth_date') ? 'has-error' : ''}}">
    {!! Form::label('birth_date', 'Birth Date', ['class' => 'control-label']) !!}
    {!! Form::text('birth_date', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('birth_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('sex') ? 'has-error' : ''}}">
    {!! Form::label('sex', 'Sex', ['class' => 'control-label']) !!}
    {!! Form::text('sex', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('education') ? 'has-error' : ''}}">
    {!! Form::label('education', 'Education', ['class' => 'control-label']) !!}
    {!! Form::text('education', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('hiring_date') ? 'has-error' : ''}}">
    {!! Form::label('hiring_date', 'Hiring Date', ['class' => 'control-label']) !!}
    {!! Form::text('hiring_date', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('hiring_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('salary') ? 'has-error' : ''}}">
    {!! Form::label('salary', 'Salary', ['class' => 'control-label']) !!}
    {!! Form::text('salary', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('salary_investor_id') ? 'has-error' : ''}}">
    {!! Form::label('salary_investor_id', 'Salary Investor Id', ['class' => 'control-label']) !!}
    {!! Form::number('salary_investor_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('salary_investor_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('experience_years') ? 'has-error' : ''}}">
    {!! Form::label('experience_years', 'Experience Years', ['class' => 'control-label']) !!}
    {!! Form::number('experience_years', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('experience_years', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('job_type') ? 'has-error' : ''}}">
    {!! Form::label('job_type', 'Job Type', ['class' => 'control-label']) !!}
    {!! Form::text('job_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('job_type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
