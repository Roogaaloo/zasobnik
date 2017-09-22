@extends('admin.layout')

@section('content')

@if($banners)
    <section>

                    <h1>Banner</h1>
                    <a href="{{ route('admin.banner.create') }}" class="btn pull-right btn-create">Vytvořit banner</a>
                    <table class="table table-striped">
                        <thead style="font-weight: 600;">
                            <tr>
                                <td width="50px">Pořadí</td>
                                <td>Krátký popis</td>
                                <td class="text-center">Status</td>

                                <td class="text-center">Obrázek</td>
                                <td class="text-right">Akce</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{ $banner->sort }}</td>
                                <td>{{ $banner->title }}</td>

                                <td class="text-center">
                                    @if($banner->status == 1)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </td>

                                <td class="text-center">@if($banner->image)<img src="{{ $banner->image }}" width="80px">@else Fotka nepřiřazena @endif</td>
                                <td class="text-right">
                                    <a href="{{ route('admin.banner.edit', $banner->id) }}" title="Upravit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.banner.delete', $banner->id) }}" title="Smazat"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


    </section>

@endif

@endsection