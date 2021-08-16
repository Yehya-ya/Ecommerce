@extends('layouts.app_layout')
@section('title', 'Add User')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add User</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="username"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                placeholder="Username" value="{{ old('username') }}" autocomplete="nickname" required>
                            @error('username')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>First Name</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="fname" class="form-control @error('fname') is-invalid @enderror"
                                name="fname" placeholder="First Name" value="{{ old('fname') }}"
                                autocomplete="given-name" required>
                            @error('fname')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Last Name</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="surname" class="form-control @error('surname') is-invalid @enderror"
                                name="surname" placeholder="Last Name" value="{{ old('surname') }}"
                                autocomplete="family-name" required>
                            @error('surname')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>E-mail Address</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="email"
                                required>
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Password</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                name="password" autocomplete="new-password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Confirm Password</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="password" id="password-confirm"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password"
                                required>
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var element = document.getElementById('user');
    element.className += " active";
    element.lastElementChild.className += " active";
    document.getElementById('user_create').className += " active";
</script>
@endpush
