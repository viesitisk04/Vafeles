@extends('layouts.app')

@section('content')
<style>
    .container-centered {
        max-width: 1100px;
        margin: 0 auto;
        padding: 20px;
    }

    .vafeles-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .vafele {
        border: 1px solid #ccc;
        padding: 15px;
        background: #fff;
        border-radius: 4px;
    }

    .vafele img {
        width: 100%;
        height: 180px;
        object-fit: contain;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .vafele h2 {
        margin: 0 0 8px;
        font-size: 1.1rem;
    }

    @media (max-width: 992px) {
        .vafeles-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 600px) {
        .vafeles-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="container-centered">

    <h1>Dzērienu piedāvājums</h1>

    <div class="vafeles-grid">
        @foreach($dzerieni as $dz)
            <div class="vafele">

                @if(!empty($dz['image']))
                    <img src="{{ $dz['image'] }}" alt="{{ $dz['name'] }}">
                @endif

                <h2>{{ $dz['name'] }}</h2>
                <p>{{ $dz['description'] ?? '' }}</p>

                <strong>Cena: €{{ number_format($dz['price'], 2) }}</strong>
            </div>
        @endforeach
    </div>

</div>
@endsection
