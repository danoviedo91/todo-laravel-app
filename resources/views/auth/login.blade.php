@extends('layouts.users')

@section('content')

<body class="d-flex justify-content-center align-items-center min-vh-100">

<div class="wwc-form-wrapper shadow wwc-form-signin d-flex align-items-center wwc-my-0 wwc-signin-wrapper">
  <div class="auth-wrapper w-100">
    <div class="sign-form">
      <h1 class="text-center wwc-fsize-main">Sign In</h1>
        
      <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
          @error('email') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
        </div>

        <div class="form-group" style="margin-bottom: 30px;>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
          @error('password') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-end align-items-center">
          <a href="{{ route('register') }}" class="mr-auto wwc-txt-cyan wwc-fsize-links">I don't have an account</a>
          <button class="btn wwc-bg-cyan text-white">Sign In!</button>
        </div>

      </form>

    </div>
  </div>
</div>

</body>

@endsection