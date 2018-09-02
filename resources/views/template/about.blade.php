@extends('layout')



@section('content')

    @include('partials.static_photo')

    @if($about)
        <section id="about">
            <div class="container about">
                <div class="row">
                    <div class="col-sm-12 text-center header-block">
                        <h1>Proč se mnou</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 about-img">
                        <img src="{{ $about->image }}" alt="Svarovský Jiří" class="img-responsive center-block">
                    </div>
                    <div class="col-sm-8">
                        {!! $about->text !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($partners)
        <section id="partners">
            <div class="container partners-about">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <br />
                        <br />
                        <h2>Partneři</h2>
                    </div>
                </div>

                @foreach($category as $c)
                    <div class="row header-block">
                        <h3>{{ $c }}</h3>
                        @foreach($partners as $partner)
                            @if($partner->category == $c)
                                <div class="col-xs-2 about-partners">
                                    <img src="{{ $partner->image }}" alt="{{ $partner->name }}" class="img-responsive">
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach

            </div>
        </section>
    @endif



@endsection


