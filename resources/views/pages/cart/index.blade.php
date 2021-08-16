@extends('layouts.app_layout')

@section('title', 'Sales')

@section('content')
@php
use App\Models\Cart;
@endphp
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Carts</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <p class="card-text">this is demo</p>
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>USER</th>
                            <th>PRICE</th>
                            <th>STATUS</th>
                            <th>COMPELETED AT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td class="text-bold-500">{{ $cart->id }}</td>
                                <td class="text-bold-500">{{ $cart->user->username }}</td>
                                <td class="text-bold-500">{{ $cart->formated_price }}</td>
                                @switch($cart->status)
                                    @case(Cart::$PENDING)
                                        <td class="text-bold-500">
                                            <span class="badge bg-info">Pending</span>
                                        </td>
                                    @break
                                    @case(Cart::$COMPLETED)
                                        <td class="text-bold-500">
                                            <span class="badge bg-success">Completed</span>
                                        </td>
                                        <td class="text-bold-500">{{ $cart->updated_at->diffForHumans() }}</td>
                                    @break
                                    @case(Cart::$CANCELED)
                                        <td class="text-bold-500">
                                            <span class="badge bg-secondary">Canceled</span>
                                        </td>
                                        <td class="text-bold-500">{{ $cart->updated_at->diffForHumans() }}</td>
                                    @break
                                    @case(Cart::$FAILED)
                                        <td class="text-bold-500">
                                            <span class="badge bg-danger">Failed</span>
                                        </td>
                                        <td class="text-bold-500">{{ $cart->updated_at->diffForHumans() }}</td>
                                    @break
                                    @default
                                @endswitch
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
    var element = document.getElementById('sales');
    element.className += " active";
</script>
@endpush
