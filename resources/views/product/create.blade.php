@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 card bg-dark">
                @include('layouts.sidebar')
            </div>
            <div class="col-md bg-light">
                <div class="container-fluid mt-2">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 shadow">
                            <h1 class=" text-center mb-0 lg-font">ADD NEW PRODUCT</h1>
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



                            <form action="/product" class="p-5" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Product Name" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" id="price" placeholder="Price" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="fruits">Fruits</option>
                                        <option value="vegetables">Vegetables</option>
                                        <option value="legumes">Legumes</option>
                                        <option value="tubers">Tubers</option>
                                        <option value="grains">Grains</option>
                                        <option value="spicies">Spicies</option>
                                        <option value="nuts">Dry Fruits and Nuts</option>
                                        {{--                            @foreach($categories as $category)--}}
                                        {{--                                <option value="{{$category->title}}">{{$category->title}}</option>--}}
                                        {{--                            @endforeach--}}
                                    </select>
                                </div>
                                <div class="from-group mb-4">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" required placeholder="Description"
                                              rows="3" class="form-control mb-0"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Submit" class="bt-blue btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
