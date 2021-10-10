
@extends('layouts.app')

@section('content')
    <div class="container-fluid justify-content-center mt-4">
        <div class="row text-center mb-5">
            <div class="col-md-1">
                @if(Gate::allows('admin-only', auth()->user()))
                    <div class="form-group">
                        <a href="/product/create" class="btn btn-success">Create</a>
                    </div>
                @endif
            </div>
            <div class="col-md-11">
                <h2 class="text-uppercase">All Products</h2>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="container mt-5 px-2 text-center justify-content-center row">
                <p class="mb-4 col-md-6 offset-3 text-center text-white bg-success py-4">
                    {{session()->get('message')}}
                </p>
            </div>
        @endif
    </div>
    <div class="container mt-5 px-2 text-center justify-content-center">
        <div class="mb-4 text-center py-4">
            <table class="table table-bordered table-hover table-dark p-5">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Price(#)</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category}}</td>
                        <td><img class='img-fluid' src='{{ asset('images/'. $product->image_path)}}'
                                 style='width: 128px; height: 128px'></td>
                        <td>
                            <a href="/product/{{ $product->id }}/edit"
                               class="btn btn-primary btn-sm">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="/product/{{$product->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
