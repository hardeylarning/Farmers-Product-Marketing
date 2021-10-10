@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 150px; margin-top: 150px;">
        <div class="row">
            <div class="col-md-6 offset-md-3 shadow">
                <h1 class=" text-center mt-3 mb-0 lg-font">UPDATE {{$category->title}}</h1>
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

                <form action="/category/{{$category->id}}" class="p-5" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$category->title}}" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="Add" value="Submit" class="bt-blue btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
