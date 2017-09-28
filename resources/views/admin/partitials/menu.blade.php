
<ul>
    <h2>Menu</h2>
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin') active @endif"><a href="/admin">Dashboard</a></li>
    @foreach($menu as $item)
        @if($item->href != '')
            <li class="@if(strlen($item->href) > 2) @if(strpos($_SERVER['REQUEST_URI'], $item->href) !== false ) active @endif @elseif($_SERVER['REQUEST_URI'] == $item->href) active @endif"><a href="/admin/{{ $item->href }}">{{ $item->name }}</a></li>
        @endif
    @endforeach
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin/banner') active @endif"><a href="{{ route('admin.banner.list') }}">Banner</a></li>
    <li class="@if($_SERVER['REQUEST_URI'] == '/admin/menu') active @endif"><a href="{{ route('admin.menu.list') }}">Menu</a></li>

</ul>