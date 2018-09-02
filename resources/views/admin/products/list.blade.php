@extends('admin.layout')

@section('content')

@if($products)
    <section>


                    <h1>{{ $title }}</h1>
                    <a href="{{ route('admin.products.create') }}" class="btn pull-right btn-create">Vytvořit produkt</a>

                    <table class="table table-striped">
                        <thead style="font-weight: 600;">
                            <tr>
                                <td>ID</td>
                                <td>Jméno</td>
                                <td>Krátký popis</td>
                                <td class="text-center">Status</td>

                                <td class="text-right">Akce</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ substr($product->perex, 0,45) }}...</td>
                                <td class="text-center">
                                    @if($product->status == 1)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </td>

                                <td class="text-right">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" title="Upravit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.products.delete', $product->id) }}" title="Smazat"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


    </section>
@endif

@endsection