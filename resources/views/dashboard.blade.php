@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3 bg-dark" style="height: 800px">
        <div class="row d-flex flex-fill">
            <div class="col-md mb-3">
                <p class="lead mt-2 display-4 text-center xl-font lm-bold text-white-50 mb-4">
                    Welcome to admin <small class="lm-bold-italic large-font text-white">
                        {{Auth()->user()->name}}</small> </p>
                <div class="row p-5 lm-bold justify-content-center" style="margin-top: 80px">
                    <div class="col-lg-4 col-md-4 mb-3">
                        <li class="list-group-item list-group-item-action d-flex justify-content-between">All Orders
                            <span class="badge badge-secondary" style="font-size: large;">{{$orders_count}}</span> </li>
                        <a href="/order" class="d-flex justify-content-between bg-secondary nav-link text-white">
                            View Details <i class="fa fa-arrow-right orange"></i></a>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-3 ">
                        <li class="list-group-item list-group-item-action list-group-item-danger text-dark d-flex justify-content-between">
                            Categories<span class="badge badge-danger" style="font-size: large;">{{$categories_count}}</span> </li>
                        <a href="/category" class="d-flex justify-content-between bg-danger nav-link text-white">
                            View Details <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-4 col-md-4 mt-2 mb-3">
                        <li class="list-group-item list-group-item-action list-group-item-dark text-dark d-flex justify-content-between">
                            Products<span class="badge badge-dark" style="font-size: large;">{{$products_count}}</span> </li>
                        <a href="/product" class="d-flex justify-content-between bg-secondary nav-link text-white lm-bold">
                            View Details <i class="fa fa-arrow-right"></i></a>
                    </div>

                    <div class="col-lg-4 col-md-4 mt-2 mb-3">
                        <li class="list-group-item list-group-item-action list-group-item-success d-flex justify-content-between">
                            Add New Category<span class="badge badge-success" style="font-size: large;"></span> </li>
                        <a href="/category/create" class="d-flex justify-content-between bg-success nav-link text-white lm-bold">
                            Click here<i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-4 col-md-4 mt-2 mb-3">
                        <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between">
                            Add New Product<span class="badge badge-primary" style="font-size: large;"></span> </li>
                        <a href="/product/create" class="d-flex justify-content-between bg-primary nav-link text-white lm-bold">
                            Click here <i class="fa fa-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
