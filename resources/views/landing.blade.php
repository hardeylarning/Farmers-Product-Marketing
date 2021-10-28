@extends('layouts.app')

@section('content')

        <div class="container-fluid ">
            <h1 class="text-center bg-dark text-white display-4 p-3 my-5">Nigeria No. 1 Farmers' Product Marketplace</h1>
        </div>
        <div class="container">
            <div id="slide" class="carousel slide" data-ride="carousel" data-interval="5000">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#slide" data-slide-to="0"></li>
                    <li data-target="#slide" data-slide-to="1"></li>
                    <li data-target="#slide" data-slide-to="2"></li>
                    <li data-target="#slide" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/1.jpg')}}" alt="" class="d-block w-100" height="500">
                        <div class="carousel-caption d-none d-md-block">
                            <p class="display-5 bg-dark">Best farm products can only be getting from us</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/2.jpg')}}" alt="" class="d-block w-100" height="500">
                        <div class="carousel-caption d-none d-md-block">
                            <p class="display-5 bg-dark">We are your plug everyday and everywhere with reliable products and fastest delivery nationwide</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/3.jpg')}}" alt="" class="d-block w-100" height="500">
                        <div class="carousel-caption d-none d-md-block">
                            <p class="display-5 bg-dark">Recommend us to people in your area.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/4.jpg')}}" alt="" class="d-block w-100" height="500">
                        <div class="carousel-caption d-none d-md-block">
                            <p class="bg-dark">Are you still doubting us, A trial will convince you.</p>
                        </div>
                    </div>
                </div>
                <a href="#slide" class="carousel-control-prev" data-slide="prev" role="button">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#slide" class="carousel-control-next" data-slide="next" role="button">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <hr class="bg-dark">
        <div class="container-fluid my-5">
            <h1 class="">Categories</h1>
            <div class="row m-2">
                <div class="col-md-4 p-3 rounded-circle">
                    <div class="card border">
                        <a href="/categories/fruits">
                            <img src="{{ asset('images/fruits.jpeg')}}" alt="" height="200" class="card-img-top">
                        </a>

                        <div class="card-body">
                            <h2 class="card-title text-center">Fruits</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="card">
                        <a href="/categories/vegetables">
                            <img src="{{ asset('images/vegetables.jpeg')}}" alt="" height="200" class="card-img-top">
                        </a>

                        <div class="card-body">
                            <h2 class="card-title text-center">Vegetables</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="card">
                        <a href="/categories/legumes">
                            <img src="{{ asset('images/legumes.jpeg')}}" alt="" height="200" class="card-img-top">
                        </a>

                        <div class="card-body">
                            <h2 class="card-title text-center">Legumes</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-3">
                    <div class="card">
                        <a href="/categories/tubers">
                            <img src="{{ asset('images/tubers.jpeg')}}" alt="" height="200" class="card-img-top">
                        </a>

                        <div class="card-body">
                            <h2 class="card-title text-center">Tubers</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="card">
                        <a href="/categories/grains">
                            <img src="{{ asset('images/grains.jpeg')}}" alt="" height="200" class="card-img-top">
                        </a>

                        <div class="card-body">
                            <h2 class="card-title text-center">Grains</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="card">
                        <a href="/categories/spicies">
                            <img src="{{ asset('images/spicies.jpeg')}}" alt="" height="200" class="card-img-top">
                        </a>

                        <div class="card-body">
                            <h2 class="card-title text-center">Spicies</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-3">
                    <div class="card">
                        <a href="/categories/nuts">
                            <img src="{{ asset('images/nuts.jpeg')}}" alt="" height="200" class="card-img-top">
                        </a>

                        <div class="card-body">
                            <h2 class="card-title text-center">Dry Fruits and Nuts</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="bg-dark">
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
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-4 mr-2 mb-3 rounded">
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
