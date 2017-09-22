<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title></title>
</head>
<body>

<div style="font-family: sans-serif; background: #87bc26;border-radius:2px; width: 500px; padding: 20px 30px;display: block;margin-left: auto;margin-right: auto;margin-top: 40px;">
    <h1>Zpráva z webu</h1>
    <p>Návštěvník {{ $name }} s emailem <a href="mailo:{{ $email }}" style="color: #fff">{{ $email }}</a> píše:</p>
    <p>{{ $text }}</p>
</div>

</body>
</html>