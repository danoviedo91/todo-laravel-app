@extends('layouts.users')

@section('content')

<body class="d-flex justify-content-center align-items-center min-vh-100">

<div class="wwc-form-wrapper shadow wwc-form-signin d-flex align-items-center">
    <div class="auth-wrapper w-100">
        <div class="sign-form">
        <h1 class="text-center wwc-fsize-main">Register</h1>

        {!! Form::open( array('route' => 'register', 'class' => '') ) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
          {!! Form::label('email', 'Email') !!}
          {!! Form::text('email', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password', 'Password') !!}
          {!! Form::password('password', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Password Confirmation') !!}
            {!! Form::password('password_confirmation', array('class' => 'form-control', 'style' => 'margin-bottom: 30px;')) !!}
        </div>
            
        <div class="d-flex justify-content-end">
            {!! link_to_route('index', 'Cancel', [], ['class' => 'btn wwc-cancel-btn']) !!}
            <button class="btn wwc-bg-cyan text-white">Register!</button>
        </div>

        </div>
    </div>
</div>

</body>

@endsection