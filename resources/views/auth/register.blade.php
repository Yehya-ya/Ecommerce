@extends('layouts.auth_layout')
@section('title')
    Register
@endsection

@section('content_left')
    <div class="auth-logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"></a>
    </div>
    <h1 class="auth-title">Sign Up</h1>
    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="username" type="text" class="form-control form-control-xl @error('username') is-invalid @enderror"
                placeholder="Username" name="username" value="{{ old('username') }}" autocomplete="nickname" autofocus required>
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
            <input id="email" type="text" class="form-control form-control-xl @error('email') is-invalid @enderror"
                placeholder="E-Mail Address" name="email" value="{{ old('email') }}" autocomplete="email"
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
        <div class="row gx-0">
            <div class="col-12 col-md-6 col-xl-6 form-group position-relative has-icon-left mb-4 pe-md-2 pe-xl-2">
                <input id="fname" type="text"
                    class="form-control form-control-xl @error('fname') is-invalid @enderror" placeholder="First Name"
                    name="fname" autocomplete="given-name" required>
                @error('fname')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-6 form-group position-relative has-icon-left mb-4 ps-md-2 ps-xl-2">
                <input id="surname" type="text"
                    class="form-control form-control-xl @error('surname') is-invalid @enderror" placeholder="Last Name"
                    name="surname" autocomplete="family-name" required>
                @error('surname')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <div class="form-control-icon ps-md-3 ps-xl-3">
                    <i class="bi bi-person"></i>
                </div>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="password" type="password"
                class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password"
                name="password" autocomplete="new-password" required>
            @error('password')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <div class="form-control-icon">
                <i class="bi bi-lock"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input id="password-confirm" type="password" class="form-control form-control-xl" placeholder="Confirm Password"
                name="password_confirmation" autocomplete="new-password" required>
            <div class="form-control-icon">
                <i class="bi bi-lock"></i>
            </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Register</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        @if (Route::has('login'))
            <p class="text-gray-600">
                Already have an account? <a href="{{ route('login') }}" class="font-bold">Log in</a>.
            </p>
        @endif
    </div>
@endsection
