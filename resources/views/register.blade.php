@extends('app')

@section('content')
    <div class="container register-page">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'register.create', 'role' => 'form']) !!}
                        <!-- First Name Input -->
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name: ') !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Email Input -->
                        <div class="form-group">
                            {!! Form::label('email', 'Email: ') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Register Button -->
                        <div class="form-group">
                            {!! Form::button('Register', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
