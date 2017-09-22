@extends('admin.layout')

@section('content')

@if($references)
    <section>

                    <h1>Reference</h1>

                    <table class="table table-striped">
                        <thead style="font-weight: 600;">
                            <tr>
                                <td>Jméno</td>
                                <td>Text</td>
                                <td>Datum vytvoření</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">HP Status</td>
                                <td class="text-right">Akce</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($references as $reference)
                            <tr>
                                <td>{{ $reference->name }}</td>
                                <td>{{ substr($reference->text, 0, 50) }}...</td>
                                <td>{{ $reference->created_at }}</td>
                                <td class="text-center">
                                    @if($reference->status == 1)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($reference->hp_status == 1)
                                        <i class="fa fa-check"></i>
                                    @else
                                        <i class="fa fa-times"></i>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('admin.reference.edit', $reference->id) }}" title="Upravit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.reference.delete', $reference->id) }}" title="Smazat"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


    </section>
@endif

@endsection