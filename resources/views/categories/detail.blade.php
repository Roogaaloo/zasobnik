@extends('layout')

@section('content')

    @include('partitials.static_photo')
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center header-block">
                    <h1>{{ $category->name }}</h1>
                </div>


                <div class="col-sm-10 col-sm-offset-1">
                    <p>{!! $category->description !!}</p>
                </div>


              {{--  <div class="col-sm-3 pull-right">
                    <ul>
                        @foreach($products as $product)
                            <li><a href="{{ route('product') }}"<h2>{{ $product->name }}</h2></li>
                        @endforeach
                    </ul>

                </div>--}}

                <div class="col-sm-10 col-sm-offset-1 text-right">
                    <a href="{{ route('categories.list') }}" class="btn">Zpět</a>
                </div>



            </div>



@endsection