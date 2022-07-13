@extends('layouts.customer_layout')

@section('title', 'Home')

@push('styles')
    @livewireStyles
    <style>
        :root {}

        .test {
            width: 100%;
            z-index: 999;
            display: flex;
        }

        .test .filter {
            width: 30%;
            height: fit-content;
            padding: 1rem;
            border-right-style: solid;
            border-right-color: var(--bordercolor);
            border-right-width: 2px;
        }

        .test .list {
            width: 70%;
            padding: 1rem;
        }

        .infilter {
            width: 100%;
            height: 100px;
        }

        .card-with-img {
            display: flex;
            flex-direction: row;
            height: fit-content;
        }

        .card-with-img .card-img-left {
            position: relative;
            width: 40%;
            height: 100%;
            padding: 1rem;
            border-radius: calc(0.7rem - 1px);
        }

        .card-with-img .card-img-left img {
            max-height: 15rem;
            min-height: 5rem;
            width: 100%;
            height: 100%;
        }

        .card-with-img .card-body {
            width: 60%;
        }

    </style>
@endpush

@section('content')
    <div class="test">
        <div class="filter">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">filter</h4>
                        <p class="card-text">this is filter</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Add</button>
                </div>
            </div>
        </div>
        <div class="list">
            @foreach ($products as $product)
                <form action="{{ route('cart.update', ['cart' => auth()->user()->cart]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card card-with-img">
                        <div class="card-img-left">
                            <img src="{{ asset('assets/images/samples/banana.jpg') }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="#" class="text-dark">{{ $product->formated_price}}</a>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
