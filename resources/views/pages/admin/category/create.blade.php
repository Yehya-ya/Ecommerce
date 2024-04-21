@extends('layouts.app_layout')
@section('title', 'Add Category')

@push('styles')
    @livewireStyles()
@endpush

@section('content')
@php
use App\Models\Category;
@endphp
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add Category</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Title</label>
                        </div>
                        @livewire('category.create-slug')
                        @error('title')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <div class="col-md-4">
                            <label>Description</label>
                        </div>
                        <div class="col-md-8 form-group mb-3">
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3"
                                name="description" required>{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
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
@livewireScripts()
@endpush
