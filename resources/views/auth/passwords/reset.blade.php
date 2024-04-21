@extends('layouts.auth_layout')
@section('title') Reset Password @endsection

@section('content_left')
<div class="auth-logo">
    <a href="{{ route('home') }}"><img src="{{ asset('assets/static/images/logo/logo.svg') }}" alt="Logo"></a>
</div>
<h1 class="auth-title">Reset Password</h1>

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" placeholder="Email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" placeholder="Password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" placeholder="Confirm Password" class="form-control form-control-xl" name="password_confirmation" required autocomplete="new-password">
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Reset Password</button>
</form>
@endsection
