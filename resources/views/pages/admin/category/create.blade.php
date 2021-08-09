@extends('layouts.app_layout')
@section('title', 'Add Category')

@section('content')
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
                            <div class="col-md-8 form-group">
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') }}" required>
                            </div>
                            @error('title')
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
    <script>
        var element = document.getElementById('category');
        element.className += " active";
        element.lastElementChild.className += " active";
        document.getElementById('category_create').className += " active";
    </script>
@endpush
