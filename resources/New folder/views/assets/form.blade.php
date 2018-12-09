<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('report') ? 'has-error' : ''}}">
    {!! Form::label('report', 'Report', ['class' => 'control-label']) !!}
    {!! Form::text('report', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('report', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('released_date') ? 'has-error' : ''}}">
    {!! Form::label('released_date', 'Released Date', ['class' => 'control-label']) !!}
    {!! Form::text('released_date', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('released_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('investor_id') ? 'has-error' : ''}}">
    {!! Form::label('investor_id', 'Investor Id', ['class' => 'control-label']) !!}
    {!! Form::text('investor_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('investor_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('school_id') ? 'has-error' : ''}}">
    {!! Form::label('school_id', 'School Id', ['class' => 'control-label']) !!}
    {!! Form::text('school_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('school_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('counter') ? 'has-error' : ''}}">
    {!! Form::label('counter', 'Counter', ['class' => 'control-label']) !!}
    {!! Form::text('counter', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('counter', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('expiration_date') ? 'has-error' : ''}}">
    {!! Form::label('expiration_date', 'Expiration Date', ['class' => 'control-label']) !!}
    {!! Form::text('expiration_date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('expiration_date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
