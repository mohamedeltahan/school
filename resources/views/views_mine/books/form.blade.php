<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('category') ? 'has-error' : ''}}">
    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
    {!! Form::text('category', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('school_id') ? 'has-error' : ''}}">
    {!! Form::label('school_id', 'School Id', ['class' => 'control-label']) !!}
    {!! Form::number('school_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('school_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', 'Code', ['class' => 'control-label']) !!}
    {!! Form::text('code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('supplier') ? 'has-error' : ''}}">
    {!! Form::label('supplier', 'Supplier', ['class' => 'control-label']) !!}
    {!! Form::text('supplier', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('supplier', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('pdf') ? 'has-error' : ''}}">
    {!! Form::label('pdf', 'Pdf', ['class' => 'control-label']) !!}
    {!! Form::text('pdf', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('pdf', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
