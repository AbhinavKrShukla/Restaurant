@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif

                <div class="card">


                    <div class="card-header">
                        {{ __('All Foods') }}
                        <span class="float-right">
                            <a href="{{route('food.create')}}">
                                <button class="btn btn-outline-secondary">Add New Food</button>
                            </a>
                        </span>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 10%">Image</th>
                                <th scope="col" style="width: 30%">Name</th>
                                <th scope="col" style="width: 15%">Description</th>
                                <th scope="col" style="width: 10%">Price</th>
                                <th scope="col" style="width: 12%">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($foods) > 0)
                                @foreach($foods as $key=>$food)
                                    <tr>
                                        <td>
                                            <div style="text-align: left;">
                                            <img src="{{asset('images')}}/{{$food->image}}" width="100" alt="Image here">
                                            </div>
                                        </td>
                                        <td>{{$food->name}}</td>
                                        <td>{{$food->description}}</td>
                                        <td>Rs. {{$food->price}}</td>
                                        <td>{{ \App\Models\Category::find($food->category_id)->name }}</td>
                                        <td>
                                            <a href="{{route("food.edit", [$food->id])}}">
                                                <button class="btn btn-outline-success">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            @include('food.bootstrap_delete_modal', ['food' => $food])
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td> No Food to Display!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

{{--        Pagination link--}}
{{--        <div class="pagination" style="overflow-y: auto; max-height: 100px">--}}
{{--            {{$foods->links()}}--}}
{{--        </div>--}}
    </div>
@endsection
