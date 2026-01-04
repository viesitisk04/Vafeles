@extends('layouts.app')

@section('content')
<style>
    .product-detail {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-bottom: 2rem;
    }
    .product-image-detail {
        width: 100%;
        height: 16rem;
        object-fit: cover;
        border-radius: 0.5rem;
    }
    .product-title-detail {
        font-size: 1.875rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #1f2937;
    }
    .product-description-detail {
        color: #6b7280;
        margin-bottom: 1rem;
    }
    .product-price-detail {
        font-size: 1.125rem;
        font-weight: 600;
        color: #16a34a;
        margin-bottom: 1rem;
    }
    .btn {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        text-decoration: none;
        transition: all 0.2s;
        font-weight: 500;
        border: none;
        cursor: pointer;
        display: inline-block;
    }
    .btn-green {
        background-color: #10b981;
        color: white;
    }
    .btn-green:hover {
        background-color: #059669;
    }
    .btn-blue {
        background-color: #3b82f6;
        color: white;
    }
    .btn-blue:hover {
        background-color: #2563eb;
    }
    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #1f2937;
    }
    .list {
        list-style: disc inside;
        color: #374151;
    }
    .back-link {
        display: inline-flex;
        align-items: center;
        color: #3b82f6;
        text-decoration: none;
    }
    .back-link:hover {
        color: #2563eb;
    }
    .container {
        max-width: 64rem;
        margin: 0 auto;
        padding: 1.5rem;
    }
    .grid-detail {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }
    @media (max-width: 768px) {
        .grid-detail {
            grid-template-columns: 1fr;
        }

        .container {
            padding: 1rem;
        }

        .product-detail {
            padding: 1.5rem;
        }

        .product-title-detail {
            font-size: 1.5rem;
        }

        .product-image-detail {
            height: 12rem;
        }

        .btn {
            width: 100%;
            text-align: center;
        }

        .section-title {
            font-size: 1.125rem;
        }
    }

    @media (max-width: 480px) {
        .product-detail {
            padding: 1rem;
        }

        .product-title-detail {
            font-size: 1.25rem;
        }

        .product-image-detail {
            height: 10rem;
        }

        .product-description-detail {
            font-size: 0.875rem;
        }

        .product-price-detail {
            font-size: 1rem;
        }

        .section-title {
            font-size: 1rem;
        }

        .list {
            font-size: 0.875rem;
        }

        .back-link {
            font-size: 0.875rem;
        }
    }
</style>

<div class="container">
    <div class="product-detail">
        <h1 class="product-title-detail">{{ $vafele['name'] }}</h1>

        <div class="grid-detail">
            <div>
                @if(!empty($vafele['image']))
                    <img src="{{ $vafele['image'] }}" alt="{{ $vafele['name'] }}" class="product-image-detail">
                @endif
            </div>

            <div>
                <p class="product-description-detail">{{ $vafele['description'] }}</p>

                <div class="product-price-detail">
                    Cena: €{{ number_format($vafele['price'], 2) }}
                </div>

                @auth
                    <form action="{{ route('grozs.pievienot') }}" method="POST" style="margin-bottom: 1rem;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $vafele['id'] }}">
                        <input type="hidden" name="nosaukums" value="{{ $vafele['name'] }}">
                        <input type="hidden" name="cena" value="{{ $vafele['price'] }}">
                        <button type="submit" class="btn btn-green" style="width:180px;max-width:100%;display:block;margin:0 auto;">Pievienot grozam</button>
                    </form>
                @endauth

                <div>
                    <h3 class="section-title">Sastāvdaļas</h3>
                    <ul class="list">
                        @foreach($vafele['ingredients'] ?? [] as $ingredient)
                            <li>{{ $ingredient }}</li>
                        @endforeach
                    </ul>
                </div>

                @if(isset($vafele['sastavs']) && $vafele['sastavs'])
                    <div style="margin-top: 1rem;">
                        <h3 class="section-title">Sastāvs</h3>
                        <p style="color: #374151;">{{ $vafele['sastavs'] }}</p>
                    </div>
                @endif

                <div style="margin-top: 1rem;">
                    <h3 class="section-title">Enerģētiskā vērtība</h3>
                    <p style="color: #374151;">{{ $vafele['energy'] ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('sakums') }}" class="back-link">
        <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Atpakaļ uz sākumu
    </a>
</div>
@endsection
