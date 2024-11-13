@extends('layouts.storelayout')
@section('title', 'My Orders')
@section('content')

<div class="container mt-5 pt-5">
    <h1>My Orders</h1>
    @foreach ($orders as $order)
        <div class="order mt-4 p-3 bg-white my-5">
            <h4>Order #{{ $order->id }}</h4>
            <p>Status: {{ $order->status }}</p>
            <p> </p>
            <table class="table my-4">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                    <tr>
                        <td>
                            <img class='mx-auto py-2'
                                width="80" height="80"   src="{{ asset('pictures/Products/' . $item->product->picture) }}"alt="Card image cap">
                            {{ $item->product->name }}</td>
                        <td>{{ $item->price }} DA</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price * $item->quantity }} DA</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total Price</b> </td>
                        <td><b>{{ $order->total_price }} DA</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
</div>
@endsection
