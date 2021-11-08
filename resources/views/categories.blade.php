@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center bg-dark text-white font-weight-bolder p-3 my-5">{{ $cat }}</h1>
        <div class="row justify-content-center">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-4 mr-2 mb-3">
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
                                <span class="float-right badge badge-dark"># {{$product->price}}</span>
                                <span class=""><a class="card-link text-decoration-none badge badge-primary px-3" href="/product/{{$product->id}}">Buy</a></span>
                            </h5>
                            <hr>
                            <p class="card-text">{{substr($product->description, 0, 30) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container mt-5 px-2 text-center justify-content-center row">
                    <p class="mb-4 display-2 col-md-6 text-center py-4">
                        No Product for this Category
                    </p>
                </div>
            @endforelse
    </div>
@endsection
