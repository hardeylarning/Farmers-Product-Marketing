@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 150px; margin-top: 150px;">
        <div class="row">
            <div class="col-md-6 offset-md-3 shadow">
                <h1 class=" text-center mt-3 mb-0 lg-font">ADD NEW PRODUCT</h1>
                @if($errors->any())
                    <div class="m-auto mx-5">
                        <ul class="navbar-nav">
                            @foreach($errors->all() as $error)
                                <li class="nav-item mx-5 text-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <form action="/product/{{$product->id}}" class="p-5" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}"  required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}"  required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{$category->title}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="from-group mb-4">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" required rows="3"
                                  class="form-control mb-0">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" value="Update" class="bt-blue btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
