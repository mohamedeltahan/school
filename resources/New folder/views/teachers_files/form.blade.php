<div class="form-group{{ $errors->has('owner_id') ? 'has-error' : ''}}">
    {!! Form::label('owner_id', 'Owner Id', ['class' => 'control-label']) !!}
    {!! Form::number('owner_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('owner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('file_name') ? 'has-error' : ''}}">
    {!! Form::label('file_name', 'File Name', ['class' => 'control-label']) !!}
    {!! Form::text('file_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('file_path') ? 'has-error' : ''}}">
    {!! Form::label('file_path', 'File Path', ['class' => 'control-label']) !!}
    {!! Form::text('file_path', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
