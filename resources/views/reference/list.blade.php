@extends('layout')

@section('content')

    @include('partials.static_photo')


        <section id="references">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center header-block">
                        <h1>Reference</h1>
                    </div>
                </div>
                <div class="row reference-row">
                    <div class="col-sm-12 reference-card reference-add">
                        <form action="{{ route('reference.addComment') }}" method="post">

                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-sm-12 reference-add-heading">
                                    <h2>Přidat recenzi</h2>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Jméno a příjmení" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="text" placeholder="Recenze" required>{{ old('text') }}</textarea>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <input type="submit" name="submit" value="Potvrdit" class="btn" style="margin-top: 5px;">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix">
                            <small>Všechna pole jsou povinná. E-mail nebude zveřejněn.</small>
                        </div>
                    </div>
                </div>

                    <?php $i = 0; ?>

                    @foreach($references as $reference)
                            @if($i == 0 or $i%2 == 0)<div class="row reference-row">@endif
                                <div class="col-sm-12 col-md-6 reference-card">
                                    @if($reference->date)<div class="reference-date">{{ $reference->date }}</div>@endif
                                    <div class="reference-icon">
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <div class="reference-content">
                                        <h2>{{ $reference->name }}</h2>
                                        <p>"{{ $reference->text }}"</p>
                                    </div>
                                </div>
                            @if($i == 1 or $i%2 != 0)</div>@endif
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        </section>


@endsection