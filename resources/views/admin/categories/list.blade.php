@extends('admin.layout')

@section('content')

@if($categories)
    <section>


                    <h1>{{ $heading }}</h1>
                    <a href="{{ route('admin.categories.create') }}" class="btn pull-right btn-create">Vytvořit produkt</a>

                    <table class="table table-striped">
                        <thead style="font-weight: 600;">
                            <tr>
                                <td>ID</td>
                                <td>Jméno</td>
                                <td>Krátký popis</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">HP Status</td>

                                <td class="text-right">Akce</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ substr($category->perex, 0,45) }}...</td>
                                <td class="text-center">
                                    @if($category->status == 1)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($category->hp_status == 1)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </td>

                                <td class="text-right">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" title="Upravit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.categories.delete', $category->id) }}" title="Smazat"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


    </section>
@endif

@endsection