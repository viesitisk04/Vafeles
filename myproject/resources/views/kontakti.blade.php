<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Sazinies ar mums</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #fafafa; }
        form { max-width: 400px; margin: auto; background: white; padding: 20px; border-radius: 10px; border: 1px solid #ddd; }
        label { font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; }
        button { background: #008cff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #006fd1; }
        .success { color: green; text-align: center; margin-bottom: 20px; }
        .error { color: red; font-size: 14px; }
        a { display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>

    <a href="{{ route('sakums') }}">⬅ Atpakaļ uz sākumu</a>

    <h1 style="text-align:center">Sazinies ar mums</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('kontakti.sutit') }}">
        @csrf

        <label>Vārds:</label>
        <input type="text" name="vards" value="{{ old('vards') }}">
        @error('vards')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>E-pasts:</label>
        <input type="email" name="epasts" value="{{ old('epasts') }}">
        @error('epasts')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Ziņa:</label>
        <textarea name="zina" rows="5">{{ old('zina') }}</textarea>
        @error('zina')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Nosūtīt ziņu</button>
    </form>

</body>
</html>
