<div class="form-group{{ $errors->has('full_name') ? 'has-error' : ''}}">
    {!! Form::label('full_name', 'Full Name', ['class' => 'control-label']) !!}
    {!! Form::text('full_name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
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
<div class="form-group{{ $errors->has('sex') ? 'has-error' : ''}}">
    {!! Form::label('sex', 'Sex', ['class' => 'control-label']) !!}
    {!! Form::text('sex', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('religion') ? 'has-error' : ''}}">
    {!! Form::label('religion', 'Religion', ['class' => 'control-label']) !!}
    {!! Form::text('religion', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('educate') ? 'has-error' : ''}}">
    {!! Form::label('educate', 'Educate', ['class' => 'control-label']) !!}
    {!! Form::text('educate', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('educate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('current_state') ? 'has-error' : ''}}">
    {!! Form::label('current_state', 'Current State', ['class' => 'control-label']) !!}
    {!! Form::text('current_state', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('current_state', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('society') ? 'has-error' : ''}}">
    {!! Form::label('society', 'Society', ['class' => 'control-label']) !!}
    {!! Form::text('society', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('society', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('level') ? 'has-error' : ''}}">
    {!! Form::label('level', 'Level', ['class' => 'control-label']) !!}
    {!! Form::text('level', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
    {!! Form::password('password', ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('school_id') ? 'has-error' : ''}}">
    {!! Form::label('school_id', 'School Id', ['class' => 'control-label']) !!}
    {!! Form::number('school_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('school_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('report') ? 'has-error' : ''}}">
    {!! Form::label('report', 'Report', ['class' => 'control-label']) !!}
    {!! Form::text('report', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('report', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('social_status') ? 'has-error' : ''}}">
    {!! Form::label('social_status', 'Social Status', ['class' => 'control-label']) !!}
    {!! Form::text('social_status', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('social_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('talent') ? 'has-error' : ''}}">
    {!! Form::label('talent', 'Talent', ['class' => 'control-label']) !!}
    {!! Form::text('talent', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('talent', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('health_state') ? 'has-error' : ''}}">
    {!! Form::label('health_state', 'Health State', ['class' => 'control-label']) !!}
    {!! Form::text('health_state', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('health_state', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('points') ? 'has-error' : ''}}">
    {!! Form::label('points', 'Points', ['class' => 'control-label']) !!}
    {!! Form::text('points', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('points', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
