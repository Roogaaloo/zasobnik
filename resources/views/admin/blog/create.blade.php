@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label>Název</label>
                <input class="form-control" type="text" name="title" required>
            </div>
            <div class="form-group">
                <label>URL</label>
                <input class="form-control" type="text" name="href" required>
            </div>
            <div class="form-group">
                <label>Perex</label>
                <input class="form-control" type="text" name="perex" required>
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea id="text" name="text"></textarea>
                @ckeditor('text', ['height' => 200])
            </div>
            <div class="form-group">
                <label>Datum k zobrazení</label>
                <input class="form-control" type="text" name="date" required>
            </div>
            <div class="form-group hidden">
                <label>Kategorie</label>
                <input class="form-control" type="text" name="category" value="1">
            </div>

           {{-- <div class="form-group">
                <label>Obrázek</label>
                <input class="form-control" type="file" name="image">
            </div>--}}

            <div class="form-group">
                <label>Reálné datum publikace</label>
                <input class="form-control" type="date" name="publish_at" required>
            </div>

            <div class="form-group">
                <input type="checkbox" name="status" value="1">
                <label>Status</label>
            </div>
            <div class="form-group">
                <input type="checkbox" name="hp_status" value="1">
                <label>Zobrazit na homepage</label>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Vytvořit" class="btn">
                <a href="{{ route('admin.blog.list') }}" class="btn">Zpět</a>
            </div>
        </form>
    </section>



@endsection
