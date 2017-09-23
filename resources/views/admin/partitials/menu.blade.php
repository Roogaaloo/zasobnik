
<ul>
    <h2>Menu</h2>
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin') active @endif"><a href="/admin">Dashboard</a></li>
    @foreach($menu as $item)
        @if($item->href != '')
            <li class="@if(strlen($item->href) > 2) @if(strpos($_SERVER['REQUEST_URI'], $item->href) !== false ) active @endif @elseif($_SERVER['REQUEST_URI'] == $item->href) active @endif"><a href="/admin/{{ $item->href }}">{{ $item->name }}</a></li>
        @endif
    @endforeach
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin/partneri') active @endif"><a href="/admin/partneri">Partneři</a></li>
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin/banner') active @endif"><a href="/admin/banner">Banner</a></li>
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin/menu') active @endif"><a href="/admin/menu">Menu</a></li>
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin/forms') active @endif"><a href="/admin/forms">Dotazníky</a></li>
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin/reset') active @endif"><a href="/admin/reset">Změna hesla</a></li>

</ul>