@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{ $page->image }}" alt="foto" class="img-responsive">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center header-block">
                <h1>{{ $page->title }}</h1>
            </div>


            <div class="col-sm-10 col-sm-offset-1">
                <p>{!! $page->description !!}</p>
            </div>
        </div>
    </div>



@endsection