@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<!-- Hero Section -->
<header class="hero bg-info text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Taste the Best</h1>
        <p class="lead">Discover delicious meals crafted with love</p>
        <a href="#" class="btn btn-light btn-lg">Explore Menu</a>
    </div>
</header>

<!-- Featured Dishes Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Featured Dishes</h2>

        @foreach($categories as $category)
            {{--Show category only if it has any item --}}

            @if(count($category->foods) > 0)
            {{-- Category --}}
            <div class="card mb-2">
                <h5 class="card-header text-center" style="">
                    {{$category->name}}
                </h5>
                {{-- DISHES --}}

                <div class="card-body">


                    <div class="row">
                        @foreach($category->foods as $food)
                            <div class="col-md-4 text-center mb-2">
                            <div class="card">
                                <img src="{{asset('images')}}/{{$food->image}}" class="card-img-top" alt="Dish 1" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$food->name}}</h5>
                                    <p class="card-text">{{$food->description}}</p>
                                    <a href="{{route('food.show', [$food->id])}}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>

            </div>
            @endif

        @endforeach

    </div>
</section>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
