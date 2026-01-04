@extends('layouts.app')

@section('content')

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .produkts {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 3rem;
        margin-top: 2rem;
    }

    .produkts img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 8px;
    }

    .info h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1rem;
    }

    .price {
        font-size: 1.5rem;
        font-weight: 600;
        color: #16a34a;
        margin-bottom: 2rem;
    }

    .info p {
        margin-bottom: 1.5rem;
        line-height: 1.6;
        color: #6b7280;
    }

    .info strong {
        color: #1f2937;
        font-weight: 600;
    }

    .btn-add-cart {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 1rem 2rem;
        border-radius: 8px;
        border: none;
        font-size: 1.125rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 2rem;
        width: 180px;
        max-width: 100%;
        text-align: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-add-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
    }

    .back-link {
        display: inline-block;
        margin-bottom: 2rem;
        color: #3b82f6;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .back-link:hover {
        color: #2563eb;
    }

    @media (max-width: 768px) {
        .produkts {
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 2rem;
        }

        .info h1 {
            font-size: 2rem;
        }

        .price {
            font-size: 1.25rem;
        }

        .btn-add-cart {
            width: 100%;
            padding: 0.875rem 1.5rem;
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 1rem;
        }

        .produkts {
            padding: 1.5rem;
            gap: 1.5rem;
        }

        .info h1 {
            font-size: 1.75rem;
        }

        .price {
            font-size: 1.125rem;
        }

        .info p {
            font-size: 0.875rem;
        }

        .btn-add-cart {
            padding: 0.75rem 1.25rem;
            font-size: 0.875rem;
        }

        .back-link {
            font-size: 0.875rem;
        }
    }
</style>

<div class="container">
    <a href="{{ url()->previous() }}" class="back-link">⬅ Atpakaļ</a>

    <div class="produkts">
        @if($produkts->attels)
            <img src="{{ $produkts->attels }}" alt="{{ $produkts->name }}">
        @endif

        <div class="info">
            <h1>{{ $produkts->name }}</h1>

            <div class="price">€{{ number_format($produkts->cena, 2) }}</div>

            @if($produkts->apraksts)
                <p><strong>Apraksts:</strong><br>{{ $produkts->apraksts }}</p>
            @endif

            @if($produkts->sastavs)
                <p><strong>Sastāvs:</strong><br>{{ $produkts->sastavs }}</p>
            @endif

            @if($produkts->energija)
                <p><strong>Enerģētiskā vērtība:</strong><br>{{ $produkts->energija }}</p>
            @endif

            @auth
            <form method="POST" action="{{ route('grozs.pievienot') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $produkts->id }}">
                <input type="hidden" name="nosaukums" value="{{ $produkts->name }}">
                <input type="hidden" name="cena" value="{{ $produkts->cena }}">
                <button type="submit" class="btn-add-cart">Pievienot grozam</button>
            </form>
            @endauth
        </div>
    </div>
</div>

@endsection
