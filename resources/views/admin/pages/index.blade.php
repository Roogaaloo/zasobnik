@extends('admin.layout')

@section('content')

@if($pages)
    <h1>{{ $heading }}</h1>
    <a href="{{ route('admin.pages.create') }}" class="btn pull-right btn-create">Vytvořit stránku</a>
    <table class="table table-striped">
        <thead style="font-weight: 600;">
        <tr>
            <td>Název</td>
            <td width="">Krátký popis</td>
            <td class="text-center">Status</td>
            <td class="text-center">HP Status</td>
            <td class="text-right">Publikováno od</td>
            <td class="text-right">Akce</td></tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ substr($page->perex, 0,45) }}...</td>
                    <td class="text-center">
                        @if($page->status == 1)
                            <i class="fa fa-check"></i>
                        @else
                            <i class="fa fa-times"></i>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($page->hp_status == 1)
                            <i class="fa fa-check"></i>
                        @else
                            <i class="fa fa-times"></i>
                        @endif
                    </td>
                    <td class="text-right">{{ $page->publish_at }}</td>
                    <td class="text-right">

                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.pages.edit', $page->id) }}"><i class="fa fa-pencil"></i> Upravit</a></li>
                                <li><a href="{{ route('admin.pages.delete', $page->id) }}"><i class="fa fa-times"></i> Smazat</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection