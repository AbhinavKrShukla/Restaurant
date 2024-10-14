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
                <form action="{{route('category.update', [$category->id])}}" method="post">
                    {{method_field("PUT")}}
                    @csrf
                    <div class="card">
                        <div class="card-header">{{ __('Update Food Category') }}</div>
                        <div class="card-body">

                            <div class="form-group mt-2 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-outline-primary">Update</button>
                            </div>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
