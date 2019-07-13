@extends('layouts.users')

@section('content')

<body class="d-flex justify-content-center align-items-center min-vh-100">

<div class="wwc-form-wrapper shadow wwc-form-signin d-flex align-items-center wwc-my-0 wwc-signin-wrapper">
  <div class="auth-wrapper w-100">
    <div class="sign-form">
			<h1 class="text-center wwc-fsize-main">Sign In</h1>
			
      {!! Form::open( array('route' => 'login', 'class' => '') ) !!}

        <div class="form-group">
          {!! Form::label('email', 'Email') !!}
          {!! Form::text('email', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password', 'Password') !!}
          {!! Form::password('password', array('class' => 'form-control', 'style' => 'margin-bottom: 30px;')) !!}
        </div>

        <div class="d-flex justify-content-end align-items-center">
          {!! link_to_route('register', "I don't have an account", [], ['class' => 'mr-auto wwc-txt-cyan wwc-fsize-links']) !!}
          <button class="btn wwc-bg-cyan text-white">Sign In!</button>
        </div>

      {{ Form::close() }}

    </div>
  </div>
</div>

</body>

@endsection