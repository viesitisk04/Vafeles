<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>{{ $vafele['name'] }}</title>
</head>
<body>
    <h1>{{ $vafele['name'] }}</h1>
    <p>{{ $vafele['description'] }}</p>
    <strong>Cena: €{{ number_format($vafele['price'], 2) }}</strong>

    <br><br>
    <a href="/">⬅ Atpakaļ uz sākumu</a>
</body>
</html>
