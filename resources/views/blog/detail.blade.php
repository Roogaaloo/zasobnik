@extends('layout')

@section('content')

    @include('partitials.static_photo')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center header-block">
                <h1>{{ $article->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <p>{!! $article->text !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-right">
                <a href="{{ route('blog.list') }}" class="btn">Zpět</a>
            </div>
        </div>
    </div>



    {{--@if($article->related)
        <div class="container related-articles">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-center header-block">
                    <h2>Podobné články</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="row">
                        @foreach($articles as $a)
                            @if($a->related == $article->id or $a->id == $article->related)
                                <div class="col-sm-4">
                                    <h3>{{ $a->title }}</h3>
                                    <p>{{ $a->perex }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif--}}

@endsection