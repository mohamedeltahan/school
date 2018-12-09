@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit supported_student #{{ $supported_student->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/supported_students') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($supported_student, [
                            'method' => 'PATCH',
                            'url' => ['/supported_students', $supported_student->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('supported_students.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
