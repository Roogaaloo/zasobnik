
<ul>
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin') active @endif"><a href="/admin">Dashboard</a></li>

    <li class="@if(strpos($_SERVER['REQUEST_URI'], '/admin/dotaznik') !== false) active @endif"><a href="{{ route('admin.form.list') }}">Dotazník</a></li>
    <li class="@if(strpos($_SERVER['REQUEST_URI'], '/admin/pages') !== false) active @endif"><a href="{{ route('admin.pages.index') }}">Stránky</a></li>
    <li class="@if(strpos($_SERVER['REQUEST_URI'], '/admin/banner') !== false) active @endif"><a href="{{ route('admin.banner.list') }}">Banner</a></li>
    <li class="@if(strpos($_SERVER['REQUEST_URI'], '/admin/menu') !== false) active @endif"><a href="{{ route('admin.menu.list') }}">Menu</a></li>

</ul>