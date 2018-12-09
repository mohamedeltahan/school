@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit teachers_attendance #{{ $teachers_attendance->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/teachers_attendance') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($teachers_attendance, [
                            'method' => 'PATCH',
                            'url' => ['/teachers_attendance', $teachers_attendance->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('teachers_attendance.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
