@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit supported_teacher #{{ $supported_teacher->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/supported_teachers') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($supported_teacher, [
                            'method' => 'PATCH',
                            'url' => ['/supported_teachers', $supported_teacher->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('supported_teachers.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
