@extends('layouts.auth_layout')
@section('title')
    Login
@endsection

@section('content_left')
    <div class="auth-logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/static/images/logo/logo.svg') }}" alt="Logo"></a>
    </div>
    <h1 class="auth-title">Log in.</h1>
    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="username" type="text" class="form-control form-control-xl @error('username') is-invalid @enderror"
                placeholder="Username or E-Mail Address" name="username" value="{{ old('username') }}" autocomplete="username" autofocus
                required>
            @error('username')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="password" type="password"
                class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password"
                name="password" autocomplete="current-password" required>
            @error('password')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" id="remember" name="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label text-gray-600" for="remember">
                Keep me logged in
            </label>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        @if (Route::has('register'))
            <p class="text-gray-600">
                Don't have an account? <a href="{{ route('register') }}" class="font-bold">Sign up</a>.
            </p>
        @endif
        @if (Route::has('password.request'))
            <p>
                <a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.
            </p>
        @endif
    </div>
@endsection
