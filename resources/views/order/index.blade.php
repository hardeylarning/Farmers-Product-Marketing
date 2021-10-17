
@extends('layouts.app')

@section('content')
    <div class="container-fluid justify-content-center mt-4">
        <h2 class="text-uppercase text-center mb-5">All Orders</h2>
    </div>
    <div class="container-fluid mt-5 px-2 text-center justify-content-center">
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
                        <th>Amount</th>
                        <th>Fee</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>{{$order->product->status}}</td>
                        <td>{{ date('jS M Y', strtotime($order->payment_date)) }}</td>
                        <td>{{$order->shipping_address}}</td>
                        <td>{{$order->product->price}}</td>
                        <td>{{$order->shipping_fee}}</td>
                        <td>{{$order->total_amount}}</td>
                        <td>{{ date('jS M Y', strtotime($order->updated_at)) }}</td>
                        <td>
                            <form action="/order/{{$order->product->id}}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-sm btn-outline-info">
                                    Update
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="/order/{{$order->id}}" method="post">
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
