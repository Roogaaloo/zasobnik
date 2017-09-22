<div class="col-sm-2">
    <img src="/img/logo.png" width="180px">
</div>
<div class="col-sm-6">
    | Administrace webu Jiří Svarovský
</div>
<div class="col-sm-3 text-right">
    {{ Auth::user()->name }}
</div>
<div class="col-sm-1 text-right">
    <a href="{{ route('logout') }}">Odhlásit</a>
</div>