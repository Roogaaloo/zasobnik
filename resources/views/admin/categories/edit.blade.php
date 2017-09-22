@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.categories.update',[$category->id]) }}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="form-group">
                <label>Název</label>
                <input class="form-control" type="text" name="title" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <label>URL</label>
                <input class="form-control" type="text" name="href" value="{{ $category->href }}">
            </div>
            <div class="form-group">
                <label>Perex</label>
                <input class="form-control" type="text" name="perex" value="{{ $category->perex }}">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea id="text" name="text">{{ $category->description }}</textarea>
                @ckeditor('text', ['height' => 200])
            </div>
            <div class="form-group">
                <input type="checkbox" name="status" value="1" @if($category->status) checked @endif>
                <label>Status</label>
            </div>
            <div class="form-group">
                <input type="checkbox" name="hp_status" value="1" @if($category->hp_status) checked @endif>
                <label>Zobrazit na homepage</label>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upravit" class="btn">
                <a href="{{ route('admin.categories.list') }}" class="btn">Zpět</a>
            </div>
        </form>
    </section>



@endsection
