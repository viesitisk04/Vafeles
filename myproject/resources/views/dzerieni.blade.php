{{--
    Šis fails attēlo dzērienu produktu sarakstu režģī ar kartiņām, kur katram produktam ir attēls, nosaukums, apraksts un cena.
    Izmanto Blade sintaksi un pielāgotu CSS.
--}}
@extends('layouts.app')

@section('content')
<style>
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }
    .product-card {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        border: 1px solid #e5e7eb;
        transition: box-shadow 0.2s;
    }
    .product-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    .product-image {
        width: 100%;
        height: 12rem;
        object-fit: cover;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }
    .product-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #1f2937;
    }
    .product-description {
        color: #6b7280;
        margin-bottom: 1rem;
    }
    .product-price {
        font-size: 1.125rem;
        font-weight: 600;
        color: #16a34a;
    }
    .container {
        max-width: 72rem;
        margin: 0 auto;
        padding: 1.5rem;
    }
    .page-title {
        font-size: 1.875rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        color: #1f2937;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }

        .product-card {
            padding: 0.875rem;
        }

        .product-image {
            height: 10rem;
        }

        .product-title {
            font-size: 1.125rem;
        }

        .product-description {
            font-size: 0.875rem;
        }

        .product-price {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 1.25rem;
        }

        .products-grid {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .product-card {
            padding: 0.75rem;
        }

        .product-image {
            height: 8rem;
        }

        .product-title {
            font-size: 1rem;
        }

        .product-description {
            font-size: 0.75rem;
        }

        .product-price {
            font-size: 0.875rem;
        }
    }
</style>

<div class="container">
    <h1 class="page-title">Dzērienu piedāvājums</h1>

    <div class="products-grid">
        @foreach($dzerieni as $dz)
            <div class="product-card">
                @if(!empty($dz['image']))
                    <img src="{{ $dz['image'] }}" alt="{{ $dz['name'] }}" class="product-image">
                @endif

                <h2 class="product-title">{{ $dz['name'] }}</h2>
                <p class="product-description">{{ $dz['description'] ?? '' }}</p>

                <div class="product-price">
                    €{{ number_format($dz['price'], 2) }}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
