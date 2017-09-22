<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title></title>
</head>
<body>

<div style="font-family: sans-serif; background: #87bc26;border-radius:2px; width: 500px; padding: 20px 30px;display: block;margin-left: auto;margin-right: auto;margin-top: 40px;">
    <h1>Zájem o schůzku</h1>
    <p>
        Klient {{ $name }}<br />
        E-mail: <a href="mailo:{{ $email }}" style="color: #fff">{{ $email }}</a><br />
        Telefon: {{ $phone }}<br />
        Lokalita: {{ $local }}<br />
        Zájem o:
    </p>
    <ul>
        @foreach($products as $product)
            @if($product)<li>{{ $product }}</li>@endif
        @endforeach
    </ul>
    <p>Text:<br />{{ $text }}</p>
</div>

</body>
</html>