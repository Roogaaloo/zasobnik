@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.pages.store') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            @include('admin.pages._form')

            <div class="form-group">
                <input type="submit" name="submit" value="Vytvořit" class="btn">
                <a href="{{ route('admin.pages.index') }}" class="btn">Zpět</a>
            </div>
        </form>
    </section>



@endsection
