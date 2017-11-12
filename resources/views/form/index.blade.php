@extends('layout')

@section('content')
    <div class="static-photo" style="background-image: url('/img/cat.jpg'); background-position: bottom center"></div>


    <section id="articles">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center header-block">
                    <h1>
                        Anketa
                    </h1>
                    <br />
                    <p>
                        Vážený pane, vážená paní,
                    </p>
                    <p>
                        jmenuji se Kristýna Skulová, jsem studentkou čtvrtého ročníku oboru
                        Zdravotnické lyceum na Střední zdravotnické škole, Brno, Jaselská,
                        příspěvková organizace. Vypracovávám maturitní práci na téma Informovanost
                        chovatelů koček o&nbsp;vlivu toxoplazmózy na lidské zdraví.
                    </p>
                    <p>
                        Tímto bych Vás chtěla požádat o&nbsp;vyplnění krátkého anketního šetření,
                        které je zcela anonymní a&nbsp;bude sloužit pouze ke zpracování dat pro výše uvedenou maturitní práci.
                        Prosím Vás tedy o&nbsp;pečlivé a&nbsp;pravdivé vyplnění.
                    </p>
                    <p>
                        Předem děkuji za Váš obětovaný čas.
                    </p>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <form action="{{ route('form.store') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Jste muž nebo žena?</h3>
                                <label class="switch form-switch men">
                                    <input type="radio" name="sex" value="Muž" id="men">
                                    <span class="slider round"></span>
                                    <label for="men" class="form-label">Muž</label>
                                </label>
                                <label class="switch form-switch woman">
                                    <input type="radio" name="sex" value="Žena" id="woman">
                                    <span class="slider round"></span>
                                    <label for="woman" class="form-label">Žena</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Kolik Vám je let?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="age" value="18 - 25" id="minAge">
                                    <span class="slider round"></span>
                                    <label for="minAge" class="form-label">18 - 25</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="age" value="26 - 40" id="lessAge">
                                    <span class="slider round"></span>
                                    <label for="lessAge" class="form-label">26 - 40</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="age" value="41 - 55" id="moreAge">
                                    <span class="slider round"></span>
                                    <label for="moreAge" class="form-label">41 - 55</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="age" value="nad 55" id="maxAge">
                                    <span class="slider round"></span>
                                    <label for="maxAge" class="form-label">nad 55</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Jak dlouho jste majitelem kočky?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="owner" value="Méně než 1 rok" id="oneYear">
                                    <span class="slider round"></span>
                                    <label for="oneYear" class="form-label">Méně než 1 rok</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="owner" value="1 – 4 roky" id="fourYear">
                                    <span class="slider round"></span>
                                    <label for="fourYear" class="form-label">1 – 4 roky</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="owner" value="5 – 10 let" id="tenYear">
                                    <span class="slider round"></span>
                                    <label for="tenYear" class="form-label">5 – 10 let</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="owner" value="10 – 20 let" id="twentYear">
                                    <span class="slider round"></span>
                                    <label for="twentYear" class="form-label">10 – 20 let</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="owner" value="Více než 20 let" id="moreYear">
                                    <span class="slider round"></span>
                                    <label for="moreYear" class="form-label">Více než 20 let</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Slyšel/a jste pojem TOXOPLAZMÓZA?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="heard" value="Ano" id="heardYes">
                                    <span class="slider round"></span>
                                    <label for="heardYes" class="form-label">Ano</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="heard" value="Ne" id="heardNo">
                                    <span class="slider round"></span>
                                    <label for="heardNo" class="form-label">Ne</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Kde jste o něm slyšel/a?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="where" value="Multimédia" id="media">
                                    <span class="slider round"></span>
                                    <label for="media" class="form-label">Multimédia</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="where" value="Internet" id="internet">
                                    <span class="slider round"></span>
                                    <label for="internet" class="form-label">Internet</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="where" value="Lékař" id="medic">
                                    <span class="slider round"></span>
                                    <label for="medic" class="form-label">Lékař</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="where" value="Veterinář" id="veterinar">
                                    <span class="slider round"></span>
                                    <label for="veterinar" class="form-label">Veterinář</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="where" value="Rodina, přátelé" id="family">
                                    <span class="slider round"></span>
                                    <label for="family" class="form-label">Rodina, přátelé</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Je toxoplazmóza přenosná na člověka?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="transfer_to" value="Ano" id="transferYes">
                                    <span class="slider round"></span>
                                    <label for="transferYes" class="form-label">Ano</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="transfer_to" value="Ne" id="transferNo">
                                    <span class="slider round"></span>
                                    <label for="transferNo" class="form-label">Ne</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="transfer_to" value="Nevím" id="transferIDK">
                                    <span class="slider round"></span>
                                    <label for="transferIDK" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Pokud ano, má vliv na lidské zdraví?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="health" value="Ano" id="healthYes">
                                    <span class="slider round"></span>
                                    <label for="healthYes" class="form-label">Ano</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="health" value="Ne" id="healthNo">
                                    <span class="slider round"></span>
                                    <label for="healthNo" class="form-label">Ne</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="health" value="Nevím" id="healthIDK">
                                    <span class="slider round"></span>
                                    <label for="healthIDK" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Pokud ano, co způsobuje? <small>(Můžete zaškrtnout více odpovědí)</small></h3>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="cause[]" value="Kožní problémy" id="skin">
                                    <span class="slider round"></span>
                                    <label for="skin" class="form-label">Kožní problémy</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="cause[]" value="Nervové problémy" id="nerve">
                                    <span class="slider round"></span>
                                    <label for="nerve" class="form-label">Nervové problémy</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="cause[]" value="Žaludeční problémy" id="stomach">
                                    <span class="slider round"></span>
                                    <label for="stomach" class="form-label">Žaludeční problémy</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="cause[]" value="Oční problémy" id="eyes">
                                    <span class="slider round"></span>
                                    <label for="eyes" class="form-label">Oční problémy</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="cause[]" value="Svalové problémy" id="muscles">
                                    <span class="slider round"></span>
                                    <label for="muscles" class="form-label">Svalové problémy</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="cause[]" value="Psychické problémy" id="psychic">
                                    <span class="slider round"></span>
                                    <label for="psychic" class="form-label">Psychické problémy</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="cause[]" value="Nevím" id="causeIDK">
                                    <span class="slider round"></span>
                                    <label for="causeIDK" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Jaká je hlavní riziková skupina?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="class" value="Děti" id="childres">
                                    <span class="slider round"></span>
                                    <label for="childres" class="form-label">Děti</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="class" value="Senioři" id="senior">
                                    <span class="slider round"></span>
                                    <label for="senior" class="form-label">Senioři</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="class" value="Těhotné ženy" id="pregnant">
                                    <span class="slider round"></span>
                                    <label for="pregnant" class="form-label">Těhotné ženy</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="class" value="Nevím" id="classIDK">
                                    <span class="slider round"></span>
                                    <label for="classIDK" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group womanYes">
                            <div class="col-sm-12">
                                <h3>Jste, nebo jste byla, těhotná?</h3>
                                <label class="switch form-switch pregnantTrue">
                                    <input type="radio" name="pregnant" value="Ano" id="pregnantYes">
                                    <span class="slider round"></span>
                                    <label for="pregnantYes" class="form-label">Ano</label>
                                </label>
                                <label class="switch form-switch pregnantFalse">
                                    <input type="radio" name="pregnant" value="Ne" id="pregnantNo">
                                    <span class="slider round"></span>
                                    <label for="pregnantNo" class="form-label">Ne</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group pregnantYes">
                            <div class="col-sm-12">
                                <h3>Byla jste v těhotenství ve styku s kočkami?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="touch" value="Ano" id="touchYes">
                                    <span class="slider round"></span>
                                    <label for="touchYes" class="form-label">Ano</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="touch" value="Ne" id="touchNo">
                                    <span class="slider round"></span>
                                    <label for="touchNo" class="form-label">Ne</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group pregnantYes">
                            <div class="col-sm-12">
                                <h3>Praktikovala jste v těhotenství nějaká preventivní opatření proti toxoplazmóze?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="clean" value="Kočičí toaletu čistili ostatní příslušníci rodiny" id="all">
                                    <span class="slider round"></span>
                                    <label for="all" class="form-label">Kočičí toaletu čistili ostatní příslušníci rodiny</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="clean" value="Pouze zvýšená hygiena rukou" id="hygiene">
                                    <span class="slider round"></span>
                                    <label for="hygiene" class="form-label">Pouze zvýšená hygiena rukou</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="clean" value="Ne" id="cleanNo">
                                    <span class="slider round"></span>
                                    <label for="cleanNo" class="form-label">Ne</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Trpíte Vy či někdo z Vašeho okolí toxoplazmózou?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="suffering" value="Ano" id="sufferingYes">
                                    <span class="slider round"></span>
                                    <label for="sufferingYes" class="form-label">Ano</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="suffering" value="Ne" id="sufferingNo">
                                    <span class="slider round"></span>
                                    <label for="sufferingNo" class="form-label">Ne</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="suffering" value="Nevím" id="sufferingIDK">
                                    <span class="slider round"></span>
                                    <label for="sufferingIDK" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Trpí Vaše kočka toxoplazmózou?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="toxic" value="Ano" id="toxicYes">
                                    <span class="slider round"></span>
                                    <label for="toxicYes" class="form-label">Ano</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="toxic" value="Ne" id="toxicNo">
                                    <span class="slider round"></span>
                                    <label for="toxicNo" class="form-label">Ne</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="toxic" value="Nevím" id="toxicIDK">
                                    <span class="slider round"></span>
                                    <label for="toxicIDK" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Jaký je původce toxoplazmózy?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="income" value="Bakterie" id="bactery">
                                    <span class="slider round"></span>
                                    <label for="bactery" class="form-label">Bakterie</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="income" value="Vir" id="vir">
                                    <span class="slider round"></span>
                                    <label for="vir" class="form-label">Vir</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="income" value="Parazit" id="parazit">
                                    <span class="slider round"></span>
                                    <label for="parazit" class="form-label">Parazit</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="income" value="Nevím" id="incomeIDK">
                                    <span class="slider round"></span>
                                    <label for="incomeIDK" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Jaké jsou možnosti přenosu toxoplazmózy? <small>(Můžete zaškrtnout více odpovědí)</small></h3>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="transfer[]" value="Kočičí trus" id="trus">
                                    <span class="slider round"></span>
                                    <label for="trus" class="form-label">Kočičí trus</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="transfer[]" value="Kočičí kousnutí" id="bite">
                                    <span class="slider round"></span>
                                    <label for="bite" class="form-label">Kočičí kousnutí</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="transfer[]" value="Neumytá zelenina" id="veget">
                                    <span class="slider round"></span>
                                    <label for="veget" class="form-label">Neumytá zelenina</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="transfer[]" value="Špatná hygiena rukou" id="hand">
                                    <span class="slider round"></span>
                                    <label for="hand" class="form-label">Špatná hygiena rukou</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="transfer[]" value="Špatně upravené maso" id="meat">
                                    <span class="slider round"></span>
                                    <label for="meat" class="form-label">Špatně upravené maso</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="transfer[]" value="Pohlavní styk" id="sex">
                                    <span class="slider round"></span>
                                    <label for="sex" class="form-label">Pohlavní styk</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="transfer[]" value="Slinami" id="sliny">
                                    <span class="slider round"></span>
                                    <label for="sliny" class="form-label">Slinami</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="checkbox" name="transfer[]" value="Nevím" id="transferIDF">
                                    <span class="slider round"></span>
                                    <label for="transferIDF" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-12">
                                <h3>Je toxoplazmóza léčitelná?</h3>
                                <label class="switch form-switch">
                                    <input type="radio" name="cure" value="Ano" id="cureYes">
                                    <span class="slider round"></span>
                                    <label for="cureYes" class="form-label">Ano</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="cure" value="Ne" id="cureNo">
                                    <span class="slider round"></span>
                                    <label for="cureNo" class="form-label">Ne</label>
                                </label>
                                <label class="switch form-switch">
                                    <input type="radio" name="cure" value="Nevím" id="cureIDK">
                                    <span class="slider round"></span>
                                    <label for="cureIDK" class="form-label">Nevím</label>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <input type="submit" class="btn" value="Odeslat">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection