@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 card bg-dark">
               @include('layouts.sidebar')
            </div>
            <div class="col-md bg-light">
                <h1 class="font-weight-bold">Dashboard</h1>
                <div class="row d-flex flex-fill">
                    <div class="col-md mb-3">
                        <h2 class="mt-2 pl-3 admin-head rounded-lg">
                            Welcome to admin <small class="lm-bold-italic large-font text-secondary">
                                {{Auth()->user()->name}}</small> </h2>
                        <div class="row p-5 lm-bold justify-content-center">
                            <div class="col-lg-4 col-md-4 mb-3">
                                <div class="card text-dark bg-warning mb-3">
                                    <div class="card-body py-5">
                                        <h3 class="card-text">All Orders
                                            <span class="badge badge-light float-right" style="font-size: large;">{{$orders_count}}</span></h3>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/order" class="d-flex text-white justify-content-between nav-link">
                                            View Details <i class="fa fa-arrow-right orange"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mb-3">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-body py-5">
                                        <h3 class="card-text">All Categories
                                            <span class="badge badge-light float-right" style="font-size: large;">{{$categories_count}}</span></h3>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/category" class="d-flex text-white justify-content-between nav-link">
                                            View Details <i class="fa fa-arrow-right orange"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mb-3">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-body py-5">
                                        <h3 class="card-text">All Products
                                            <span class="badge badge-light float-right" style="font-size: large;">{{$products_count}}</span></h3>
                                    </div>
                                    <div class="card-footer text-white">
                                        <a href="/product" class="d-flex text-white justify-content-between nav-link">
                                            View Details <i class="fa fa-2x text-dark"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="card text-dark bg-info  mb-3">
                                    <div class="card-body py-5">
                                        <h3 class="card-text">Add New Category</h3>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/category/create" class="d-flex text-white justify-content-between nav-link">
                                            Open... <i class="fa fa-arrow-right orange"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="card text-white bg-secondary  mb-3">
                                    <div class="card-body py-5">
                                        <h3 class="card-text">Add New Product</h3>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/order" class="d-flex text-white justify-content-between nav-link">
                                            Open... <i class="fa fa-arrow-right orange"></i></a>
                                    </div>
                                </div>
                            </div>
{{--                                <li class="list-group-item list-group-item-action d-flex justify-content-between">All Orders--}}
{{--                                    <span class="badge badge-secondary" style="font-size: large;">{{$orders_count}}</span> </li>--}}
{{--                                <a href="/order" class="d-flex justify-content-between bg-secondary nav-link text-white">--}}
{{--                                    View Details <i class="fa fa-arrow-right orange"></i></a>--}}

{{--                            <div class="col-lg-4 col-md-4 mb-3 ">--}}
{{--                                <li class="list-group-item list-group-item-action list-group-item-danger text-dark d-flex justify-content-between">--}}
{{--                                    Categories<span class="badge badge-danger" style="font-size: large;">{{$categories_count}}</span> </li>--}}
{{--                                <a href="/category" class="d-flex justify-content-between bg-danger nav-link text-white">--}}
{{--                                    View Details <i class="fa fa-arrow-right"></i></a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
