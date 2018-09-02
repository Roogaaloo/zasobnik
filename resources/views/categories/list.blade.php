@extends('layout')

@section('content')

    @include('partials.static_photo')

    @if($categories)
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
            </div>
        </section>
    @endif

@endsection