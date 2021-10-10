
@extends('layouts.app')

@section('content')
    <div class="container-fluid justify-content-center mt-4">
        <h2 class="text-uppercase text-center mb-5">All Orders</h2>
    </div>
    <div class="container mt-5 px-2 text-center justify-content-center">
        <div class="mb-4 text-center py-4">
            <table class="table table-bordered table-hover table-dark p-5">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer's Name</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Payment Date</th>
                        <th>Shipping Address</th>
                        <th>Delivered</th>
                        <th>Amount</th>
                        <th>Fee</th>
                        <th>Total Amount</th>
                        <th>Date</th>
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
