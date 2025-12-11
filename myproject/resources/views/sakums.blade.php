<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Burbuļvafeles</title>
    <style>
        .vafeles-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
        .vafele { border: 1px solid #ccc; padding: 15px; margin: 0; background: #fff; border-radius:4px; }
        .vafele h2 { margin: 0 0 8px 0; font-size: 1.1rem; }
        .vafele img { width: 100%; height: 160px; object-fit: cover; display:block; margin-bottom: 10px; border-radius:4px; }

        @media (max-width: 992px) {
            .vafeles-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 480px) {
            .vafeles-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <h1>Burbuļvafeļu piedāvājums</h1>
    <div class="vafeles-grid">
    @foreach($vafeles as $vafele)
        <div class="vafele">
            @if(!empty($vafele['image']))
                <img src="{{ $vafele['image'] }}" alt="{{ $vafele['name'] }}">
            @endif

            <h2>{{ $vafele['name'] }}</h2>
            <p>{{ $vafele['description'] }}</p>
            <strong>Cena: €{{ number_format($vafele['price'], 2) }}</strong>
            <br><br>
            <a href="{{ route('vafele.show', $vafele['id']) }}">Apskatīt vairāk</a>
        </div>
    @endforeach
    </div>

    <br>
    <a href="{{ route('kontakti') }}">Sazināties ar mums</a>
</body>
</html>
