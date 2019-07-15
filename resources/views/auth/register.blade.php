@extends('layouts.users')

@section('content')

<body class="d-flex justify-content-center align-items-center min-vh-100">

<div class="wwc-form-wrapper shadow wwc-form-signin d-flex align-items-center">
    <div class="auth-wrapper w-100">
        <div class="sign-form">
        <h1 class="text-center wwc-fsize-main">Register</h1>

        <form method="POST" action="{{ route('register') }}" style="margin-bottom: 30px;">
        
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
                @error('first_name') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
                @error('last_name') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('index') }}" class="btn wwc-cancel-btn">Cancel</a>
                <button class="btn wwc-bg-cyan text-white">Register!</button>
            </div>
        
        </form>

        </div>
    </div>
</div>

</body>

@endsection