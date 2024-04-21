@extends('layouts.app_layout')
@section('title', 'Add Product')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add Product</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('admin.product.store') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Title</label>
                        </div>
                        @livewire('product.create-slug')
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
                        <div class="col-md-4">
                            <label>Price</label>
                        </div>
                        <div class="col-md-8 form-group">
                            @livewire('currency', ['price' => old('value') * 100 + old('decimal')])
                        </div>
                        @error('value')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        @error('decimal')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <div class="col-md-4">
                            <label>Stock</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text">#</span>
                                <input type="number" id="stock"
                                    class="form-control @error('stock') is-invalid @enderror" name="stock"
                                    placeholder="Stock" value="{{ old('stock') }}" min="1" required>
                            </div>
                        </div>
                        @error('stock')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <div class="col-md-4">
                            <label>Categories</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select class="selectpicker" style="width: 100%" multiple data-live-search="true"
                                name="categories[]">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
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
