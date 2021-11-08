@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center text-uppercase my-3 font-weight-bold">ORDER DETAILS</h1>
        <div class="container mt-5 justify-content-center text-center">
            <div class="row">
                <div class="col-md-6 offset-md-3 shadow">
                    <h1 class=" text-center mt-3 mb-2">
                        <p>Shipping Address: {{$data['address']}}</p>
                        <p>Shipping fee: #{{$data['fee']}}</p>
                        <p>Amount: #{{$product->price}}</p>
                        <p>Total amount: #{{$data['total']}}</p>
                    </h1>
                    @if(Auth::user())
                        <form action="{{ route('pay') }}" class="" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                            @csrf
                            <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
                            <input type="hidden" name="order_id" value="{{$product->id}}">
                            <input type="hidden" name="amount" value="{{$data['total'] * 100}}"> {{-- required in kobo --}}
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="currency" value="NGN">
                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => Auth::user()->id,
                    'id' => $product->id, 'address' => $data['address'], 'fee' => $data['fee']]) }}" >
                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                            <input type="hidden" name="callback_url" value="http://127.0.0.1:8000/payment/callback">
                            <div class="form-group mx-5">
                                <input type="submit" name="order" value="Pay Now" class="bt-blue btn-block">
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
