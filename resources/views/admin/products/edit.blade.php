@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.products.update',[$product->id]) }}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="form-group">
                <label>Název</label>
                <input class="form-control" type="text" name="title" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label>URL</label>
                <input class="form-control" type="text" name="href" value="{{ $product->href }}">
            </div>
            <div class="form-group">
                <label>Perex</label>
                <input class="form-control" type="text" name="perex" value="{{ $product->perex }}">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea id="text" name="text">{{ $product->description }}</textarea>
                @ckeditor('text', ['height' => 200])
            </div>
            <div class="form-group">
                <input type="checkbox" name="status" value="1" @if($product->status) checked @endif>
                <label>Status</label>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upravit" class="btn">
                <a href="{{ route('admin.products.index') }}" class="btn">Zpět</a>
            </div>
        </form>
    </section>



@endsection
