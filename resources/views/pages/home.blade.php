@extends('layouts.app_layout')

@section('title', 'Home')

@push('styles')
    @livewireStyles
@endpush

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-12 col-lg-4 p-1">
                <div class="card">
                    <form action="{{ route('cart.update', ['cart' => auth()->user()->cart]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">{{ $product->title }}</h4>
                                <p class="card-text">
                                    {{ $product->description }}
                                </p>
                            </div>
                            <img class="img-fluid w-100" src="{{ asset('assets/images/samples/banana.jpg') }}"
                                alt="Card image cap">
                            @livewire('pay', ['product_id' => $product->id])
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
@livewireScripts
<script>
    var element = document.getElementById('home');
    element.className += " active";
</script>
@endpush
