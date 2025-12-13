@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Burbuļvafeles</title>

    <style>
        /* KONTAINERS, KAS CENTRĒ VISU LAPĀ */
        .container-centered {
            max-width: 1100px;     /* platums centrētajam saturam */
            margin: 0 auto;       /* centrēšana horizontāli */
            padding: 20px;
        }

        /* GRID – 3 kolonas */
        .vafeles-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* ← tieši 3 kolonas */
            gap: 20px;
        }

        /* Vienas produkta kartiņas stils */
        .vafele {
            border: 1px solid #ccc;
            padding: 15px;
            background: #fff;
            border-radius: 4px;
        }

        .vafele h2 { margin: 0 0 8px 0; font-size: 1.1rem; }

        .vafele img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        /* RESPONSIVITĀTE */
        @media (max-width: 992px) {
            .vafeles-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 600px) {
            .vafeles-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="container-centered">

    <h1>Vafeļu piedāvājums</h1>

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

                <a href="{{ route('vafele.show', $vafele['id']) }}">Apskatit vairak</a>

                <form action="{{ route('grozs.pievienot') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $vafele['id'] }}">
                    <input type="hidden" name="nosaukums" value="{{ $vafele['name'] }}">
                    <input type="hidden" name="cena" value="{{ $vafele['price'] }}">

                    <button type="submit">Pievienot grozam</button>
                </form>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
@endsection
