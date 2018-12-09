<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('library_id') ? 'has-error' : ''}}">
    {!! Form::label('library_id', 'Library Id', ['class' => 'control-label']) !!}
    {!! Form::number('library_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('library_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('governorate') ? 'has-error' : ''}}">
    {!! Form::label('governorate', 'Governorate', ['class' => 'control-label']) !!}
    {!! Form::text('governorate', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('governorate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('center') ? 'has-error' : ''}}">
    {!! Form::label('center', 'Center', ['class' => 'control-label']) !!}
    {!! Form::text('center', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('center', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('Adminstration') ? 'has-error' : ''}}">
    {!! Form::label('Adminstration', 'Adminstration', ['class' => 'control-label']) !!}
    {!! Form::text('Adminstration', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('Adminstration', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('mother_village') ? 'has-error' : ''}}">
    {!! Form::label('mother_village', 'Mother Village', ['class' => 'control-label']) !!}
    {!! Form::text('mother_village', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('mother_village', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('village') ? 'has-error' : ''}}">
    {!! Form::label('village', 'Village', ['class' => 'control-label']) !!}
    {!! Form::text('village', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('village', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('school_created_at') ? 'has-error' : ''}}">
    {!! Form::label('school_created_at', 'School Created At', ['class' => 'control-label']) !!}
    {!! Form::text('school_created_at', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('school_created_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('seasonal_vacation') ? 'has-error' : ''}}">
    {!! Form::label('seasonal_vacation', 'Seasonal Vacation', ['class' => 'control-label']) !!}
    {!! Form::text('seasonal_vacation', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('seasonal_vacation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('working_hours') ? 'has-error' : ''}}">
    {!! Form::label('working_hours', 'Working Hours', ['class' => 'control-label']) !!}
    {!! Form::text('working_hours', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('working_hours', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
    {!! Form::text('type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('created_way') ? 'has-error' : ''}}">
    {!! Form::label('created_way', 'Created Way', ['class' => 'control-label']) !!}
    {!! Form::text('created_way', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('created_way', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('education_accelerate') ? 'has-error' : ''}}">
    {!! Form::label('education_accelerate', 'Education Accelerate', ['class' => 'control-label']) !!}
    {!! Form::text('education_accelerate', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('education_accelerate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('levels') ? 'has-error' : ''}}">
    {!! Form::label('levels', 'Levels', ['class' => 'control-label']) !!}
    {!! Form::number('levels', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('levels', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', 'Code', ['class' => 'control-label']) !!}
    {!! Form::text('code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('rate') ? 'has-error' : ''}}">
    {!! Form::label('rate', 'Rate', ['class' => 'control-label']) !!}
    {!! Form::text('rate', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
