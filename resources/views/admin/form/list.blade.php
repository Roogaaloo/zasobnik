@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>
    </section>

    <table>
        <thead>
        <tr>
            <td>ID</td>
            <td>Datum a čas přidání</td>
        </tr>
        </thead>
    </table>

    @if(isset($forms))



    @endif

@endsection