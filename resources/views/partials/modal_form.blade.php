<div class="meeting-popup">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 meeting-popup-body">
                <div class="close">x</div>
                <form method="post" action="{{ route('contact.addMeeting') }}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Jméno a příjmení</label>
                            <input class="form-control" type="text" name="name" placeholder="Jméno a příjmení" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Telefon</label>
                            <input class="form-control" type="text" name="phone" placeholder="Telefon" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="text">Zpráva</label>
                                <textarea class="form-control" rows="5" name="text" id="text" placeholder="Zpráva">{{ old('text') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="checkbox" id="agree" name="agree"> <label for="agree">Souhlasím se zpracováním osobních údajů.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <input type="submit" name="submit" value="Odeslat" class="btn">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>