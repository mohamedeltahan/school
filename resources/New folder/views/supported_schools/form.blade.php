<div class="form-group{{ $errors->has('investor_id') ? 'has-error' : ''}}">
    {!! Form::label('investor_id', 'Investor Id', ['class' => 'control-label']) !!}
    {!! Form::number('investor_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('investor_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('school_id') ? 'has-error' : ''}}">
    {!! Form::label('school_id', 'School Id', ['class' => 'control-label']) !!}
    {!! Form::number('school_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('school_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('support_lvl') ? 'has-error' : ''}}">
    {!! Form::label('support_lvl', 'Support Lvl', ['class' => 'control-label']) !!}
    {!! Form::number('support_lvl', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('support_lvl', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
