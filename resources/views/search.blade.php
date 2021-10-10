@extends('layouts.app')

@section('content')
    @if($products)
    <div class="container-fluid ">
        <h1 class="text-center bg-dark text-white display-4 p-3 my-5">Search Result</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">

            @forelse($products as $product)
                <div class="col-md-3 mr-2 mb-2">
                    <div class="card card-deck">
                        <img src="{{ asset('images/'. $product->image_path)}}" height="150" width="200"  class="card-img-top" alt="" />
                        <div class="card-body">
                            <h5 class="card-title">
                                <span>{{$product->name}}</span>
                            </h5>

                            <h6 class="card-subtitle mb-2">
                                <span class="text-muted">{{$product->category}}</span>
                            </h6>
                            <hr class="bg-dark">
                            <h5>
                                <span class="float-right">#{{$product->price}}</span>
                                <span class=""><a class="card-link" href="/product/{{$product->id}}">Buy</a></span>
                            </h5>
                            <hr>
                            <p class="card-text">{{substr($product->description, 0, 30) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container mt-5 px-2 text-center justify-content-center row">
                    <p class="mb-4 display-2 col-md-6 text-center py-4">
                        No Search Found
                    </p>
                </div>

            @endforelse

        </div>
    </div>
    @endif
@endsection
