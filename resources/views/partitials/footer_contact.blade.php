<div id="footer-contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <a href="{{ route('template.contact') }}">{!! $contact->name??'Robert Galovič' !!}</a>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('template.contact') }}"> <span class="number">{!! $contact->telephone??'+420 123 456 789' !!}</span></a>
            </div>
            <div class="col-sm-4">
                <a href="mailto:{{ $contact->email??'info@test.cz' }}">{{ $contact->email??'info@test.cz' }}</a>
            </div>
        </div>
    </div>
</div>