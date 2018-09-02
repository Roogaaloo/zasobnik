@extends('layout')

@section('content')

    @include('partials.slider')
    @if(isset($page))
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!! $page->description !!}
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <h1>Úvodní strana nebyla vytvořena!</h1>
                </div>
            </div>
        </div>
    @endif


@endsection



