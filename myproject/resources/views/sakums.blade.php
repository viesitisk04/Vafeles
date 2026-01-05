{{--
    Šis fails ir sākumlapa ar hero sekciju, paziņojumiem un produktu izcelšanu. Izmanto Blade sintaksi un CSS.
--}}
@extends('layouts.app')

@section('content')
<style>
    .hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
        margin-bottom: 3rem;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .hero p {
        font-size: 1.25rem;
        opacity: 0.9;
    }

    .success-message {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        border: 1px solid #10b981;
        color: #065f46;
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
        margin: 2rem auto;
        max-width: 600px;
        font-weight: 500;
        font-size: 1.125rem;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .product-card:hover {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }

    .product-image {
        width: 100%;
        height: 14rem;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .product-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #1f2937;
    }

    .product-description {
        color: #6b7280;
        margin-bottom: 1rem;
        line-height: 1.5;
    }

    .product-price {
        font-size: 1.25rem;
        font-weight: 600;
        color: #16a34a;
        margin-bottom: 1rem;
    }

    .btn {
        display: inline-block;
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
        border: none;
        cursor: pointer;
        margin-bottom: 0.5rem;
    }

    .btn-blue {
        background-color: #3b82f6;
        color: white;
    }

    .btn-blue:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
    }

    .btn-green {
        background-color: #10b981;
        color: white;
    }

    .btn-green:hover {
        background-color: #059669;
        transform: translateY(-2px);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        color: #1f2937;
    }

    .product-actions {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    .product-actions .btn {
        width: 100%;
        max-width: 100%;
        text-align: center;
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
        box-sizing: border-box;
    }

    .product-card .btn {
        width: 100%;
        max-width: 100%;
        margin: 0;
    }

    @media (max-width: 1024px) {
        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            padding: 1.25rem;
        }

        .product-image {
            height: 12rem;
        }
    }

    @media (max-width: 768px) {
        .hero {
            padding: 3rem 1rem;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1.125rem;
        }

        .success-message {
            margin: 1.5rem 1rem;
            padding: 1.25rem;
            font-size: 1rem;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }

        .product-card {
            padding: 1rem;
        }

        .product-image {
            height: 10rem;
            margin-bottom: 1rem;
        }

        .product-title {
            font-size: 1.25rem;
        }

        .page-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .hero {
            padding: 2rem 1rem;
        }

        .hero h1 {
            font-size: 2rem;
        }

        .hero p {
            font-size: 1rem;
        }

        .products-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .product-card {
            padding: 1rem;
            border-radius: 8px;
        }

        .product-image {
            height: 8rem;
        }

        .product-title {
            font-size: 1.125rem;
        }

        .product-price {
            font-size: 1.125rem;
        }

        .btn {
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
        }

        .page-title {
            font-size: 1.75rem;
        }

        .success-message {
            margin: 1rem 0.5rem;
            padding: 1rem;
            font-size: 0.875rem;
        }
    }
</style>

<div class="hero">
    <h1>Sveicināti Burbuļvafeles!</h1>
    <p>Garlaicīgas un gardas vafeles, kas izgatavotas ar mīlestību</p>
</div>

@if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h1 class="page-title">Vafeļu piedāvājums</h1>

    <div class="products-grid">
        @foreach($vafeles as $vafele)
            <div class="product-card">
                @if(!empty($vafele['image']))
                    <img src="{{ $vafele['image'] }}" alt="{{ $vafele['name'] }}" class="product-image">
                @endif

                <h2 class="product-title">{{ $vafele['name'] }}</h2>
                <p class="product-description">{{ $vafele['description'] }}</p>

                <div class="product-price">
                    €{{ number_format($vafele['price'], 2) }}
                </div>

                        @auth
                        <div class="product-actions">
                            <a href="{{ route('vafele.show', $vafele['id']) }}" class="btn btn-blue">Apskatīt vairāk</a>
                            <form action="{{ route('grozs.pievienot') }}" method="POST" style="margin: 0;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $vafele['id'] }}">
                                <input type="hidden" name="nosaukums" value="{{ $vafele['name'] }}">
                                <input type="hidden" name="cena" value="{{ $vafele['price'] }}">
                                <button type="submit" class="btn btn-green">Pievienot grozam</button>
                            </form>
                        </div>
                        @endauth
            </div>
        @endforeach
    </div>
</div>

@endsection
