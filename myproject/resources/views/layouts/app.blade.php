<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Vafeles</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        nav {
            background: #333;
            padding: 15px;
        }
        nav a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
            font-size: 18px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 20px;
        }
        .grid { display: flex; flex-wrap: wrap; gap: 20px; }
        .item { border: 1px solid #ccc; padding: 15px; width: 250px; border-radius: 10px; }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('sakums') }}">Vafeles</a>
    <a href="{{ route('uzkodas') }}">Uzkodas</a>
    <a href="{{ route('dzerieni') }}">Dzerieni</a>
    <a href="{{ route('kontakti') }}">Kontakti</a>
    <a href="{{ route('grozs.index') }}">Grozs</a>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>