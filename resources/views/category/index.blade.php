@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif

                <div class="card">


                    <div class="card-header">
                        {{ __('All Category') }}
                        <span class="float-right">
                            <a href="{{route('category.create')}}">
                                <button class="btn btn-outline-secondary">Add New Category</button>
                            </a>
                        </span>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 50%">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($categories) > 0)
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <a href="{{route("category.edit", [$category->id])}}">
                                                <button class="btn btn-outline-success">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            @include('category.bootstrap_delete_modal', ['category' => $category])
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td> No Category to Display!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
