@extends('layout')

@section('content')
    @include('partitials.static_photo')


    <section id="articles">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center header-block">
                    <h1>Dotazník</h1>
                </div>
            </div>
            <div class="row">
                <label class="switch">
                    <input type="radio" name="dcc" value="1">
                    <span class="slider round"></span>
                </label>
                <label class="switch">
                    <input type="radio" name="dcc" value="2">
                    <span class="slider round"></span>
                </label>
                <br />
                <br />
                <br />
                <label class="switch">
                    <input type="checkbox" name="dcc">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </section>


@endsection