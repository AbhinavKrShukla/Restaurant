@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Image') }}</div>

                    <div class="card-body">
                        <img src="{{asset('images')}}/{{$food->image}}"
                             style="width: 700px; object-fit: cover"
                             alt="Dish Image"
                             class="img-responsibe">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Details') }}</div>

                    <div class="card-body">
                        <h4 class="card-title">{{$food->name}}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{$food->category->name}}</h6>
                        <p class="card-text">{{$food->description}}</p>
                        <h5 class="card-text">Rs. {{$food->price}}</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
