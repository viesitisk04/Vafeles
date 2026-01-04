<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Burbuļvafeles</title>

    {{-- Breeze + Tailwind --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans antialiased bg-gray-100">

    {{-- NAVBAR --}}
    @include('layouts.navigation')

    {{-- LAPAS SATURS --}}
    <main class="max-w-7xl mx-auto py-6 px-4">
        @yield('content')
    </main>

</body>
</html>
