@extends('layout')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
@endsection

@section('content')

    @include('partitials.slider')


{{--    @if($categories)
        <section id="categories">
            <div class="container hp-categories">
                <div class="row">
                    @foreach($categories as $category)
                            <div class="col-sm-4 col-xs-6 text-center category-card" onclick="location.href='{{ route('categories.detail', $category->href) }}'">
                                <h2>{{ $category->name }}</h2>
                                <p>{{ $category->perex }}</p>
                                <a href="{{ route('categories.detail', $category->href) }}" class="category-btn">Více</a>
                            </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a href="{{ route('categories.list') }}" class="btn btn-more">Více produktů</a>
                    </div>
                </div>
            </div>
        </section>
    @endif--}}
    @if($home_text)
        <section id="home-text" class="padding shadow-background home-text-desktop">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 photo-hp" style="background-image:url({{ $home_text->media }});">
                    </div>
                    <div class="col-sm-6 text-about">
                        @if($home_text->heading)<h2>{{ $home_text->heading }}</h2>@endif
                        @if($home_text->text){!! $home_text->text !!}@endif<br />
                        <a href="{{ route('template.about') }}" class="btn">Více</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if($references)
        <section id="references" class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 single-item text-center">
                        @foreach($references as $reference)
                            <div class="reference-item" onclick="location.href='{{ route('reference.list') }}'">
                                <div class="reference-icon reference-icon-hp">
                                    <i class="fa fa-user-circle-o"></i>
                                </div>
                                <h3>{{ $reference->name }}</h3>
                                <p>"{{ $reference->text }}"</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if($articles)
        <section id="articles" class="padding shadow-background homepage">
            <div class="container">
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-sm-5 hp-article" onclick="location.href='{{ route('blog.detail', $article->href) }}'">
                            <div class="blog-icon">
                                <i class="fa fa-sticky-note-o"></i>
                            </div>
                            <div class="blog-content">
                                <h3>{{ $article->title }}</h3>
                                <div class="blog-date">{{ $article->date }}</div>
                                <p>{{ $article->perex }}</p>
                                <a href="{{ route('blog.detail', $article->href) }}" class="btn">Číst více</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection



