<footer>
    @if($_SERVER['REQUEST_URI'] != '/kontakt')
        @include('partials.footer_contact')
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Copyright &copy; <span class="number">2017 @if(date('Y') != 2017) - {{ date('Y') }} @endif</span> {!! $contact->name??'Robert Galovič' !!}. Všechna&nbsp;práva&nbsp;vyhrazena.
            </div>
        </div>
    </div>
</footer>