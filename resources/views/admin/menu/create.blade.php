@extends('admin.layout')

@section('content')


    <section>

        <h1>Banner</h1>
        <form action="{{ route('admin.menu.store') }}" method="post">
            {!! csrf_field() !!}
            <table class="table table-striped">
            <thead style="font-weight: 600;">
            <tr>
                <td width="50px">Pořadí</td>
                <td>Název</td>
                <td>URL</td>
                <td class="text-right">Akce</td>
            </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><input class="form-control" type="number" name="sort"></td>
                        <td><input class="form-control" type="text" name="name"></td>
                        <td><input class="form-control" type="text" name="href"></td>

                        <td class="text-right">
                            <button href="{{ route('admin.menu.store') }}" type="submit" title="Uložit"><i class="fa fa-check"></i></button>
                        </td>
                    </tr>
            </tbody>
        </table>
        </form>


    </section>



@endsection