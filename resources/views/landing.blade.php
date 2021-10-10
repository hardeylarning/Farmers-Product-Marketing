@extends('layouts.app')

@section('content')

        <div class="container-fluid ">
            <h1 class="text-center bg-dark text-white display-4 p-3 my-5">Nigeria No. 1 Farmers' Product Marketplace</h1>
        </div>
        <div class="container">
            <div class="container mb-5">
                <div class="mt-2">
                    <form action="/search" method="post">
                        @csrf
                        <div class="input-group text-white-50"  style=" border: solid #161817 2px; border-radius: 10px; color: #161817; " >
                            <input type="search" name="search" id="" placeholder="Search for product here" class="form-control lm">
                            <div class="input-group-append">
                                <button type="submit" name="submit" value="search" class="btn btn-dark btn-block" >
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($products as $product)
                    <div class="col-md-3 mr-2 mb-3">
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
                @endforeach
            </div>
        </div>
@endsection
