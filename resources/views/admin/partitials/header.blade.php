<div class="col-sm-2 logo">
    <img src="/img/logo_admin.png">
    <div class="admin-text">
        Admin
    </div>
</div>
<div class="col-sm-6">
    | Administrace webu Robert Galovič
</div>
<div class="col-sm-2 col-sm-offset-2 text-right">
    <div class="dropdown">
        <button type="button" data-toggle="dropdown">{{ Auth::user()->name }}
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="{{ route('admin.reset') }}">Změna hesla</a></li>
            <li><a href="{{ route('logout') }}">Odhlásit</a></li>
        </ul>
    </div>
</div>


