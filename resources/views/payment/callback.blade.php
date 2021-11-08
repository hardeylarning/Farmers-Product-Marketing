@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center text-uppercase my-3 font-weight-bold">PAYMENT RESPONSE</h1>
        <div class="container mt-5 justify-content-center text-center">
            <div class="row">
                <div class="col-md-6 offset-md-3 shadow ">
                    <h1 class=" text-center mt-3 mb-2">
                        @if($res['status'])
                            <div class="container mt-3">
                                <img src="{{ asset('images/success_edit.png')}}" class="" width="200" height=200" alt="">
                                <p class="text-center mt-2">Payment was successful <span>Your order will be shipped shortly</span></p>
                                <script>
                                    setTimeout(function () {
                                        window.location.href = "/home"
                                    }, 5000)
                                </script>
                            </div>
                        @else
                            <div class="container mt-3">
                                <img src="{{ asset('images/failed_edit.png')}}" class="card-img img-fluid" height="200" alt="">
                                <p class="text-center mt-2">Payment was not successful <span>Your can re-order</span></p>
                            </div>
                        @endif
                    </h1>

                </div>
            </div>
        </div>

    </div>
@endsection
