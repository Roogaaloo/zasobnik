@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label>Obrázek</label>
                <input class="form-control" type="file" name="image">
            </div>

            <div class="form-group">
                <label>Hlavní text</label>
                <input class="form-control" type="text" name="title">
            </div>

            <div class="form-group">
                <label>Sekundární text</label>
                <input class="form-control" type="text" name="perex">
            </div>

            <div class="form-group">
                <input type="checkbox" name="status" value="1">
                <label>Status</label>
            </div>

            <div class="form-group">
                <label>Pořadí</label>
                <input class="form-control" type="number" name="sort">
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Vytvořit" class="btn">
                <a href="{{ route('admin.banner.list') }}" class="btn">Zpět</a>
            </div>
        </form>
    </section>



@endsection
