@extends('admin.layout')

@section('content')

    <section>
        <h1>{{ $heading }}</h1>

        <form action="{{ route('admin.partners.store') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}


            <div class="form-group clearfix">
                <label>Banky</label>
                <input class="form-control" type="file" name="banky">
                @foreach($banky as $p)

                    @if($p->image)
                        <div style="position: relative;float:left;margin-right: 20px;height:80px">
                            <div class="delete-partner"><a href="{{ route('admin.partners.delete', $p->id) }}"><i class="fa fa-times"></i></a></div>
                            <img src="{{ $p->image }}" width="70px">
                        </div>
                    @else
                        Fotka nepřiřazena
                    @endif
                @endforeach
            </div>

            <br />

            <div class="form-group clearfix">
                <label>Penze</label>
                <input class="form-control" type="file" name="penze">
                @foreach($penze as $p)

                    @if($p->image)
                        <div style="position: relative;float:left;margin-right: 20px;height:80px">
                            <div class="delete-partner"><a href="{{ route('admin.partners.delete', $p->id) }}"><i class="fa fa-times"></i></a></div>
                            <img src="{{ $p->image }}" width="70px">
                        </div>
                    @else
                        Fotka nepřiřazena
                    @endif
                @endforeach
            </div>

            <br />

            <div class="form-group clearfix">
                <label>Pojištění</label>
                <input class="form-control" type="file" name="pojisteni">
                @foreach($pojisteni as $p)

                    @if($p->image)
                        <div style="position: relative;float:left;margin-right: 20px;height:80px">
                            <div class="delete-partner"><a href="{{ route('admin.partners.delete', $p->id) }}"><i class="fa fa-times"></i></a></div>
                            <img src="{{ $p->image }}" width="70px">
                        </div>
                    @else
                        Fotka nepřiřazena
                    @endif
                @endforeach
            </div>

            <br />

            <div class="form-group clearfix">
                <label>Stavební spoření</label>
                <input class="form-control" type="file" name="stavebni">
                @foreach($stavebni as $p)

                    @if($p->image)
                        <div style="position: relative;float:left;margin-right: 20px;height:80px">
                            <div class="delete-partner"><a href="{{ route('admin.partners.delete', $p->id) }}"><i class="fa fa-times"></i></a></div>
                            <img src="{{ $p->image }}" width="70px">
                        </div>
                    @else
                        Fotka nepřiřazena
                    @endif
                @endforeach
            </div>



            <div class="form-group">
                <input type="submit" name="submit" value="Upravit" class="btn">
            </div>
        </form>
    </section>



@endsection
