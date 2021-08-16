@extends('layouts.app_layout')
@section('title', 'Categories Listing')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Categories</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <p class="card-text">
                this is demo
            </p>
            <!-- Table with outer spacing -->
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>SLUG</th>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th># OF PRODUCTS</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-bold-500">{{ $category->slug }}</td>
                                <td class="text-bold-500">{{ $category->title }}</td>
                                <td class="text-bold-500">{{ $category->description }}</td>
                                <td class="text-bold-500">{{ $category->products_count }}</td>
                                <td class="text-bold-500">
                                    {{ $category->created_at ? $category->updated_at->diffForHumans() : '' }}</td>
                                <td class="text-bold-500">
                                    {{ $category->updated_at ? $category->updated_at->diffForHumans() : '' }}</td>
                                <td class="text-bold-500">
                                    <a href="{{ route('admin.category.edit', ['category' => $category]) }}"
                                        class="btn btn-primary rounded-pill">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var element = document.getElementById('category');
    element.className += " active";
    element.lastElementChild.className += " active";
    document.getElementById('category_index').className += " active";
</script>
@endpush
