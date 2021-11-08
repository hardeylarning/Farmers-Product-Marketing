@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center font-weight-bold">{{ __('Dashboard') }}</div>
                    @if (session('status'))
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif

            </div>
        </div>
    </div>
</div>
<br/>
    <div class="container mt-5">
        <div class="row">
            @forelse($orders as $order)
                <div class="col-md-5 mr-auto mb-3 " style="font-size: 25px; font-weight: bold">
                    <p class="mb-2">Order Name: {{$order->product->name}}</p>
                    <p class="mb-2">Status: {{$order->product->status}}</p>
                    <p class="mb-2">Shipping Address: {{$order->shipping_address}}</p>
                    <p class="mb-2">Price: #{{$order->product->price}}</p>
                    <p class="mb-2">Shipping Fee: #{{$order->shipping_fee}}</p>
                    <p class="mb-2">Total Cost: #{{$order->total_amount}}</p>
                    <p class="mb-2">Payment Date: {{ date('jS M Y', strtotime($order->updated_at)) }}</p>
                </div>

            @empty
                <div class="container mt-5 px-2 text-center justify-content-center row">
                    <p class="mb-4 col-md-6 text-center py-4">
                        All your Orders will be displayed here
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
