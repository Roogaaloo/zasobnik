<div id="footer-contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <a href="{{ route('template.contact') }}">{!! $contact->name !!}</a>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('template.contact') }}"> <span class="number">{!! $contact->telephone !!}</span></a>
            </div>
            <div class="col-sm-4">
                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            </div>
        </div>
    </div>
</div>