@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}


            <div class="form-group">
                <label for="text">Text</label>
                <textarea id="text" name="text">{{ $about->text }}</textarea>
                @ckeditor('text', ['height' => 200])
            </div>

            <div class="form-group">
                <label>Obrázek</label>
                <input class="form-control" type="file" name="image">
                @if($about->image)<img src="{{ $about->image }}" width="200px">@else Fotka nepřiřazena @endif
            </div>





            <div class="form-group">
                <input type="submit" name="submit" value="Upravit" class="btn">
            </div>
        </form>
    </section>



@endsection
