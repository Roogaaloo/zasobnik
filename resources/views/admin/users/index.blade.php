@extends('admin.layout')

@section('content')

@if($pages)
    <h1>{{ $heading }}</h1>
    <a href="{{ route('admin.pages.create') }}" class="btn pull-right btn-create">Vytvořit stránku</a>
    <table class="table table-striped">
        <thead style="font-weight: 600;">
        <tr>
            <td>ID</td>
            <td>Jméno</td>
            <td class="text-center">Status</td>
            <td class="text-right">Vytvořeno</td>
            <td class="text-right">Akce</td></tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="text-center">
                        @if($user->status == 1)
                            <i class="fa fa-check"></i>
                        @else
                            <i class="fa fa-times"></i>
                        @endif
                    </td>

                    <td class="text-right">{{ $user->created_at }}</td>
                    <td class="text-right">

                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.users.edit', $user->id) }}"><i class="fa fa-pencil"></i> Upravit</a></li>
                                <li><a href="{{ route('admin.users.delete', $user->id) }}"><i class="fa fa-times"></i> Smazat</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection