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

                <form action="{{route('food.store')}}" method="post" enctype="multipart/form-data"> @csrf

                    <div class="card">
                        <div class="card-header">{{ __('Add New Food') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form-group>
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </form-group>

                            <form-group>
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </form-group>

                            <form-group>
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </form-group>

                            <form-group>
                                <label for="category">Category</label>
                                @include('food.bs_modal_CL')
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </form-group>

                            <form-group>
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </form-group>

                            <form-group>
                                <button class="btn btn-outline-primary mt-2" type="submit">Submit</button>
                            </form-group>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
