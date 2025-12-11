<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Kontakti</title>
</head>
<body>

<h1>Sazināties ar mums</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('kontakti.sutit') }}">
    @csrf

    <label>Vārds:</label><br>
    <input type="text" name="vards" value="{{ old('vards') }}"><br>
    @error('vards') <p style="color:red">{{ $message }}</p> @enderror

    <label>E-pasts:</label><br>
    <input type="email" name="epasts" value="{{ old('epasts') }}"><br>
    @error('epasts') <p style="color:red">{{ $message }}</p> @enderror

    <label>Ziņojums:</label><br>
    <textarea name="zinojums">{{ old('zinojums') }}</textarea><br>
    @error('zinojums') <p style="color:red">{{ $message }}</p> @enderror

    <button type="submit">Sūtīt</button>
</form>

<br>
<a href="/">⬅ Atpakaļ uz sākumu</a>

</body>
</html>
