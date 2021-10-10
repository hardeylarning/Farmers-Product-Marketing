@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center text-uppercase my-3 font-weight-bold">{{$product->name}}</h1>
        <div class="row justify-content-center">
            <div class="col-md container">
                <div class="container mt-3">
                    <img src="{{ asset('images/'. $product->image_path)}}" class="card-img" height="500" alt="">
                </div>
            </div>
            <div class="col-md-4 p-2 border-left border-dark mt-5">
                <h4 class="mt-5">Created on {{ date('jS M Y', strtotime($product->updated_at)) }}</h4>
                <p class="mt-5 text-justify border-left pl-2 border-white">
                    {{$product->description}}
                </p>
                <h2 class="mx-3"><span class="text-muted">Price</span><span class="float-right badge badge-dark"># {{$product->price}}</span></h2>
                <hr>
                @if(Auth::user())
                <form action="/payment/checkout" class="p-5" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="state" class="">State</label>
                        <select name="state" id="state" class="form-control" required>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Ekiti">Ekiti</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="address">Location Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
                    </div>
                    <input type="hidden" value="{{$product->price}}">
                    <div class="form-group">
                        <input type="submit" name="order" value="Proceed" class="bt-blue btn-block">
                    </div>
                </form>
                @else
                    <a href="/login" class="btn btn-primary">Login first to order for this item</a>

                @endif
            </div>
        </div>
    </div>
@endsection
