@extends('layouts.app_layout')
@section('title', 'Products Listing')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Products</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <p class="card-text">this is demo
                </p>
                <!-- Table with outer spacing -->
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>DESCRIPTION</th>
                                <th>PRICE</th>
                                <th>STOCK</th>
                                <th>CATEGORIES</th>
                                <th>CREATED AT</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-bold-500">{{ $product->id }}</td>
                                    <td class="text-bold-500">{{ $product->title }}</td>
                                    <td class="text-bold-500">{{ $product->description }}</td>
                                    <td class="text-bold-500">${{ $product->price }}.00</td>
                                    <td class="text-bold-500">{{ $product->stock }}</td>
                                    <td class="text-bold-500">
                                        @foreach ($product->categories as $category )
                                            {{$category->title}}
                                            @if (!$loop->last)
                                                {{", "}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-bold-500">{{ ($product->updated_at) ? $product->updated_at->diffForHumans() : '' }}</td>
                                    <td class="text-bold-500">
                                        <a href="{{ route('admin.product.edit', ['product' => $product]) }}" class="btn btn-primary rounded-pill">
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
        var element = document.getElementById('product');
        element.className += " active";
        element.lastElementChild.className += " active";
        document.getElementById('product_index').className += " active";
    </script>
@endpush
