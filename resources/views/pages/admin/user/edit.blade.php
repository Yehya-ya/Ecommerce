@extends('layouts.app_layout')
@section('title', 'Edit User')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit User</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('admin.user.update', ['user' => $user]) }}"
                method="POST">
                @method('PUT')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="username"
                                class="form-control  @error('username') is-invalid @enderror" name="username"
                                placeholder="Username" value="{{ $user->username }}" autocomplete="nickname" required>
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
                            <input type="text" id="fname" class="form-control  @error('fname') is-invalid @enderror"
                                name="fname" placeholder="First Name" value="{{ $user->fname }}"
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
                            <input type="text" id="surname" class="form-control  @error('surname') is-invalid @enderror"
                                name="surname" placeholder="First Name" value="{{ $user->surname }}"
                                autocomplete="family-name" required>
                            @error('surname')
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
                                name="password" autocomplete="new-password">
                        </div>
                        <div class="col-md-4">
                            <label>Confirm Password</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="password" id="password-confirm"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
