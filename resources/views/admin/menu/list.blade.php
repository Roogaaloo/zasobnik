@extends('admin.layout')

@section('content')


        <section>

            <h1>Banner</h1>
            <a href="{{ route('admin.menu.create') }}" class="btn pull-right btn-create">Vytvořit položku menu</a>

            <table class="table table-striped">
                <thead style="font-weight: 600;">
                <tr>
                    <td width="50px">Pořadí</td>
                    <td>Název</td>
                    <td>URL</td>
                    <td class="text-center">Status</td>
                    <td class="text-right">Akce</td>
                </tr>
                </thead>
                <tbody>
                @if(isset($menu))
                    @foreach($menu as $item)
                        <form action="{{ route('admin.menu.update', $item->id) }}" method="post">
                            {!! csrf_field() !!}
                        <tr>
                            <td><input class="form-control" type="number" name="sort" value="{{ $item->sort }}"></td>
                            <td><input class="form-control" type="text" name="name" value="{{ $item->name }}"></td>
                            <td><input class="form-control" type="text" name="href" value="{{ $item->href }}"></td>

                            <td class="text-center">
                                @if($item->status == 1)
                                    <i class="fa fa-check"></i>
                                @else
                                    <i class="fa fa-times"></i>
                                @endif
                            </td>


                            <td class="text-right">
                                <button href="{{ route('admin.menu.update', $item->id) }}" type="submit" title="Upravit"><i class="fa fa-pencil"></i></button>
                                @if($item->status == 1)
                                    <a href="{{ route('admin.menu.hide', $item->id) }}" title="Zakázat"><i class="fa fa-cloud"></i></a>
                                @else
                                    <a href="{{ route('admin.menu.show', $item->id) }}" title="Povolit"><i class="fa fa-check"></i></a>
                                @endif

                                <a href="{{ route('admin.menu.delete', $item->id) }}" title="Smazat"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        </form>
                    @endforeach
                    @else
                            <p>Zatím nebyla vytvořená žádná položka menu</p>
                    @endif
                </tbody>
            </table>



        </section>



@endsection