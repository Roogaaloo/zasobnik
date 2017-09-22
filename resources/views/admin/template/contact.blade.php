@extends('layout')



@section('content')

    <style>
        main{
            padding-top: 0px;
        }
    </style>

    @include('partitials.google_map')
    @include('partitials.footer_contact')

    <section id="contact">
        <div class="container contact">
            <div class="row">
                <div class="col-sm-12 text-center header-block">
                    <h1>Napište mi</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <form action="{{ route('contact.sendMessage') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Jméno a příjmení</label>
                                <input class="form-control" type="text" name="name" placeholder="Jméno a příjmení">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>E-mail</label>
                                <input class="form-control" type="email" name="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Zpráva</label>
                                    <textarea class="form-control" rows="5" name="text" placeholder="Zpráva"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-right">
                                    <input type="submit" name="submit" value="Potvrdit" class="btn">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <br />
    <section id="contact-map">
        <div class="container contact-map">
            <div class="row">
                <div class="col-sm-12 text-center header-block">
                    <h2>Kam za vámi přijedu?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <img src="img/map.gif" alt="Kam za vámi přijedu?" class="img-responsive center-block" style="width: 100%">
                </div>
            </div>
        </div>
    </section>



@endsection


