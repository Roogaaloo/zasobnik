@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.contact.update') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label>Obrázek</label>
                <input class="form-control" type="file" name="image">
                @if($contact->image)<img src="{{ $home_text->media }}" width="200px">@else Fotka nepřiřazena @endif
            </div>

            <div class="form-group">
                <label>Nadpis</label>
                <input class="form-control" type="text" name="heading" value="{{ $home_text->heading }}" required>
            </div>

            <div class="form-group">
                <label for="text">Text</label>
                <textarea id="text" name="text" required>{{ $home_text->text }}</textarea>
                @ckeditor('text', ['height' => 200])
            </div>

            <div class="form-group">
                <label>Jméno</label>
                <input class="form-control" type="text" name="name" value="{!! $contact->name !!}" required>
            </div>

            <div class="form-group">
                <label>Telefon</label>
                <input class="form-control" type="text" name="phone" value="{!! $contact->telephone !!}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="email" value="{{ $contact->email }}" required>
            </div>


            <div class="form-group">
                <input type="submit" name="submit" value="Upravit" class="btn">
            </div>
        </form>
    </section>



@endsection
