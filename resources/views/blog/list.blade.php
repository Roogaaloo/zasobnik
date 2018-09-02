@extends('layout')

@section('content')
    @include('partials.static_photo')


    <section id="articles">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center header-block">
                    <h1>Blog</h1>
                </div>
            </div>
            <div class="row">
                @if($articles)
                    @foreach($articles as $article)
                        <div class="col-sm-4" onclick="location.href='{{ route('blog.detail', $article->href) }}'">
                            @if($article->image and strlen($article->image) > 1) <img src="{{ $article->image }}"> @endif
                            <h3>{{ $article->title }}</h3>
                            <div class="blog-date">{{ $article->date }}</div>
                            <p>{{ $article->perex }}</p>
                            <a href="blog/article/{{ $article->href }}" class="btn">Číst více</a>
                        </div>
                    @endforeach
                @else
                    <div class="col-sm-12 text-center">
                        <h2>Dosud nebyly zveřejněny žádné články</h2>
                    </div>
                @endif
            </div>
        </div>
    </section>


@endsection