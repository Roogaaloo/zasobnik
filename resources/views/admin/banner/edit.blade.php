@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.banner.update',[$banner->id]) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label>Obrázek</label>
                <input class="form-control" type="file" name="image">
                @if($banner->image)<img src="{{ $banner->image }}" width="200px">@else Fotka nepřiřazena @endif
            </div>

            <div class="form-group">
                <label>Název</label>
                <input class="form-control" type="text" name="title" value="{{ $banner->title }}">
            </div>

            <div class="form-group">
                <label>Perex</label>
                <input class="form-control" type="text" name="perex" value="{{ $banner->perex }}">
            </div>

            <div class="form-group">
                <input type="checkbox" name="status" value="1" @if($banner->status) checked @endif>
                <label>Status</label>
            </div>

            <div class="form-group">
                <label>Pořadí</label>
                <input class="form-control" type="number" name="sort" value="{{ $banner->sort }}">
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Upravit" class="btn">
                <a href="{{ route('admin.banner.list') }}" class="btn">Zpět</a>
            </div>
        </form>
    </section>



@endsection
