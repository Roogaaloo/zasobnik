
<ul>
    @foreach($adminMenu as $item)
        <li class="@if($_SERVER['REQUEST_URI'] == str_replace('http://'.$_SERVER['SERVER_NAME'],'', route($item['route']))) active @endif"><a href="{{ route($item['route']) }}">{{ $item['title'] }}</a></li>
    @endforeach
</ul>