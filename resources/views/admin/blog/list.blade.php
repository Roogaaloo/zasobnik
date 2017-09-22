@extends('admin.layout')

@section('content')

@if($articles)
    <section>

                    <h1>Blog</h1>
                    <a href="{{ route('admin.blog.create') }}" class="btn pull-right btn-create">Vytvořit článek</a>
                    <table class="table table-striped">
                        <thead style="font-weight: 600;">
                            <tr>

                                <td>Jméno</td>
                                <td>Krátký popis</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">HP Status</td>
                                <td>Datum publikace</td>
                                <td class="text-right">Akce</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>

                                <td>{{ $article->title }}</td>
                                <td>{{ substr($article->perex, 0,45) }}...</td>
                                <td class="text-center">
                                    @if($article->status == 1)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($article->hp_status == 1)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </td>
                                <td>{{ $article->publish_at }}</td>
                                <td class="text-right">
                                    <a href="{{ route('admin.blog.edit', $article->id) }}" title="Upravit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.blog.delete', $article->id) }}" title="Smazat"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


    </section>
@endif

@endsection