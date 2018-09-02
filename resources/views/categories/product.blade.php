@extends('layout')

@section('content')

    @include('partials.static_photo')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center header-block">
                <h1>{{ $product->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <p>{!! $product->description !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-right">
                <a href="{{ route('categories.detail', $category_href) }}" class="btn">Zpět</a>
            </div>
        </div>
    </div>

@endsection