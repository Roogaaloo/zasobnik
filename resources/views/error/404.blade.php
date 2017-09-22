@extends('layout')



@section('content')

    @include('partitials.static_photo')


        <section id="404">
            <div class="container 404">
                <div class="row">
                    <div class="col-sm-12 text-center header-block">
                        <h1>{{ $heading }}</h1>
                    </div>
                </div>
                <div class="row not_found">
                    <div class="col-sm-6">
                        <p>Stránka nemohla být zobrazena kvůli jednomu z následujících důvodů:</p>

                        <ul>
                            <li>špatně napsaná URL adresa nebo zastaralá oblíbená položka</li>
                            <li>zastaralý odkaz z výsledků vyhledáče</li>
                            <li>neplatný interní odkaz v rámci aktuálního webu</li>
                            <li>neplatný odkaz z jiného webu</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <p>
                            V prohlížení můžete pokračovat na <a href="/">hlavní straně</a>, nebo zvolte některou z položek menu.
                        </p>

                    </div>
                </div>

            </div>
        </section>


@endsection


