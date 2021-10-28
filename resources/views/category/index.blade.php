
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 card bg-dark">
                @include('layouts.sidebar')
            </div>
            <div class="col-md bg-light">
                <div class="container-fluid justify-content-center mt-4">
                    <div class="row text-center mb-5">
                        <div class="col-md-1">
                            @if(Gate::allows('admin-only', auth()->user()))
                                <div class="form-group">
                                    <a href="/category/create" class="btn btn-success">Create</a>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-11">
                            <h2 class="text-uppercase">All Categories</h2>
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
                <div class="container mt-5 px-2 text-center justify-content-center row">
                    <div class="mb-4 col-md text-center py-4">
                        <table class="table table-hover p-5">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($categories as $category)
                                    <td>{{$category->title}}</td>
                                    <td>
                                        <a href="/category/{{ $category->id }}/edit"
                                           class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/category/{{$category->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection


{{--<div class="form-group">
    <div class="input-group ">
        <div class="form-radio col-sm">
            <label class="form-check-label">
                <input type="radio" autofocus class="form-control @error('gender') is-invalid @enderror" name="gender" value="Male" checked> Female
            </label>
        </div>
        <div class="form-radio col-sm">
            <label class="form-check-label">
                <input type="radio" autofocus class="form-control @error('gender') is-invalid @enderror" name="gender" value="Female"> Male
            </label>
        </div>
        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>--}}

