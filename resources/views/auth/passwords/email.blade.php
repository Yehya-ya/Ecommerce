@extends('layouts.auth_layout')
@section('title')
    Reset Password
@endsection

@section('content_left')
    <div class="auth-logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"></a>
    </div>
    <h1 class="auth-title">Forgot Password</h1>
    <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="email" type="text" class="form-control form-control-xl @error('email') is-invalid @enderror"
                placeholder="E-Mail Address" name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                required>
            @error('email')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Send Password Reset Link</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        @if (Route::has('login'))
            <p class="text-gray-600">Remember your account? <a href="{{ route('login') }}" class="font-bold">Log in</a>.
            </p>
        @endif
    </div>
@endsection
