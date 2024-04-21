@extends('layouts.app_layout')

@section('title', 'Cart')

@section('content')
<div class="card collapse-icon accordion-icon-rotate mx-5">

    <div class="card-header d-flex justify-content-between">
        <h1 class="card-title py-2 m-0">Cart</h1>
        <div class="my-auto">
            <form action="{{ route('cart.cancel', ['cart' => $cart]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?');">Cancel</button>
        </form>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="accordion" id="cardAccordion">
                @foreach ($cart->products as $product)
                    <div class="card">
                        <div class="card-header collapsed d-flex justify-content-between"
                            id="heading{{ $product->sale->id }}" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $product->sale->id }}" aria-expanded="false"
                            aria-controls="collapse{{ $product->sale->id }}" role="button">
                            <span class="collapsed collapse-title text-gray-600">{{ $product->sale->quantity }} x
                                {{ $product->title }}</span>
                            <span class="font-extrabold text-gray-600">{{ $product->sale->formated_price }}</span>
                        </div>
                        <div id="collapse{{ $product->sale->id }}" class="collapse"
                            aria-labelledby="heading{{ $product->sale->id }}" data-parent="#cardAccordion" style="">
                            <div class="card-body px-5 py-0">
                                {{ $product->description }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer mx-5">
            <div class="d-flex justify-content-between">
                <span class="font-extrabold text-gray-600 text-xl mx-4">Totle Price:</span>
                <span class="font-extrabold text-gray-600 text-xl mx-4">{{ $cart->formated_price }}</span>
            </div>
            <form action="{{ route('cart.pay', ['cart' => $cart]) }}" method="POST">
                <div class="row px-5 py-3 m-0" style="width: 100%">
                    @method('PUT')
                    @csrf
                    <button class="btn btn-primary btn-lg">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
