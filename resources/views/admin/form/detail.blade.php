@extends('admin.layout')

@section('content')

        <h1>{{ $heading }}</h1>

        <div class="row">
            <div class="col-sm-12">
                <h4>Jste muž nebo žena?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question1 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Kolik Vám je let?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question2 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Jak dlouho chováte kočky?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question3 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Slyšel/a jste pojem TOXOPLAZMÓZA?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question4 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Kde jste o něm slyšel/a?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question5 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Je toxoplazmóza přenosná na člověka?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question6 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Jste, nebo jste byla těhotná?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question7 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Praktikovala jste v těhotenství nějaká preventivní opatření proti toxoplazmóze?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question8 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Trpíte Vy či někdo z Vašeho okolí toxoplazmózou?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question9 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Trpíte Vy či někdo z Vašeho okolí toxoplazmózou?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question10 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Jaké jsou možnosti přenosu toxoplazmózy?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question11 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Jaký je původce toxoplazmózy?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question12 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Je toxoplazmóza léčitelná?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question13 }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Jaká je hlavní riziková skupina?</h4>
            </div>
            <div class="col-sm-12">
                <p class="well well-sm"><strong>{{ $item->question14 }}</strong></p>
            </div>
        </div>

@endsection