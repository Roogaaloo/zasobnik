@extends('admin.layout')

@section('content')


        <h1>{{ $heading }}</h1>
    <table class="table table-striped">
        <thead style="font-weight: 600">
        <tr>
            <td width="20%">ID</td>
            <td width="80%" class="text-right">Datum a čas přidání</td>
        </tr>
        </thead>

        <tbody>
            @if(isset($forms))
                @foreach($forms as $item)
                    <tr style="cursor:pointer;" onclick="window.location.href='{{ route('admin.form.detail', $item->id) }}'">
                        <td width="20%">{{ $item->id }}</td>
                        <td width="80%" class="text-right">{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

        <p class="pull-right">Vypisuji {{ $count }} záznamů</p>
@endsection