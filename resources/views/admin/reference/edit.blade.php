@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.reference.update',[$reference->id]) }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label>Jméno</label>
                <input class="form-control" type="text" name="title" value="{{ $reference->name }}" disabled>
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input class="form-control" type="text" name="email" value="{{ $reference->email }}" disabled>
            </div>

            <div class="form-group">
                <label>Text</label>
                <textarea class="form-control" rows="3" name="text" required>{{ $reference->text }}</textarea>
            </div>

            <div class="form-group">
                <label>Datum</label>
                <input class="form-control" type="text" name="date" value="{{ $reference->date }}">
            </div>

            <div class="form-group">
                <input type="checkbox" name="status" value="1" @if($reference->status) checked @endif>
                <label>Status</label>
            </div>
            <div class="form-group">
                <input type="checkbox" name="hp_status" value="1" @if($reference->hp_status) checked @endif>
                <label>Zobrazit na homepage</label>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upravit" class="btn">
                <a href="{{ route('admin.reference.list') }}" class="btn">Zpět</a>
            </div>
        </form>
    </section>



@endsection
