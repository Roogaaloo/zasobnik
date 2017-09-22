@extends('layout')



@section('content')



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
                <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
                    <form action="{{ route('contact.sendMessage') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Jméno a příjmení</label>
                                <input class="form-control" type="text" name="name" placeholder="Jméno a příjmení" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>E-mail</label>
                                <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Zpráva</label>
                                    <textarea class="form-control" rows="5" name="text" placeholder="Zpráva" required></textarea>
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

@endsection

@section('scripts')

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoaogpThEMkzUJz8yfBZR9wv6DCEYarOQ&callback=initMap"></script>

    <script type="text/javascript">
        function initMap() {
            //var uluru = {lat: 49.1758315, lng:16.6056285};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {lat: 49.1879303, lng:16.6056285},
                scrollwheel:false,
                draggable:true,

            });
            var marker = new google.maps.Marker({
                position: {lat: 49.1758315, lng:16.6056285},
                map: map
            });
        }
    </script>

@endsection

