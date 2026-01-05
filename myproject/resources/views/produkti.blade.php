{{--
    Šis fails attēlo visu produktu sarakstu režģī ar kartiņām, izmantojot stilizāciju un Blade sintaksi.
    Katram produktam tiek parādīts attēls, nosaukums, apraksts, cena un poga pievienošanai grozam.
--}}
@extends('layouts.app')

@section('content')
<style>
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
        display: flex;
        flex-direction: column;
        min-height: 450px;
    }

    .product-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-description {
        flex: 1;
        margin-bottom: 1rem;
    }

    .product-footer {
        margin-top: auto;
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
        width: 90%;
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
        width: 100%;
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

    .auth-message {
        color: #6b7280;
        font-size: 0.875rem;
        text-align: center;
        margin-top: 1rem;
    }

    .no-products {
        text-align: center;
        color: #6b7280;
        font-size: 1.125rem;
        margin-top: 3rem;
    }

    @media (max-width: 768px) {
        .container {
            padding: 0 1rem;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            padding: 1.25rem;
            min-height: 400px;
        }

        .product-image {
            height: 12rem;
        }

        .product-title {
            font-size: 1.25rem;
        }

        .product-description {
            font-size: 0.875rem;
        }

        .product-price {
            font-size: 1.125rem;
        }

        .btn {
            width: 100%;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
        }

        .success-message {
            margin: 1.5rem 1rem;
            padding: 1.25rem;
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 1.75rem;
        }

        .products-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .product-card {
            padding: 1rem;
            min-height: 350px;
        }

        .product-image {
            height: 10rem;
        }

        .product-title {
            font-size: 1.125rem;
        }

        .product-description {
            font-size: 0.75rem;
        }

        .product-price {
            font-size: 1rem;
        }

        .btn {
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
        }

        .auth-message {
            font-size: 0.75rem;
        }

        .success-message {
            margin: 1rem 0.5rem;
            padding: 1rem;
            font-size: 0.875rem;
        }
    }

</style>

<div class="container">
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="page-title">{{ $kategorija->name }}</h1>

    @if($produkti->count())
        <div class="products-grid">
            @foreach($produkti as $produkts)
                <div class="product-card">
                    @if($produkts->attels)
                        <img src="{{ $produkts->attels }}" alt="{{ $produkts->name }}" class="product-image">
                    @endif

                    <div class="product-content">
                        <h2 class="product-title">{{ $produkts->name }}</h2>
                        <p class="product-description">{{ $produkts->apraksts }}</p>
                    </div>

                    <div class="product-footer">
                        <div class="product-price">
                            €{{ number_format($produkts->cena, 2) }}
                        </div>

                            
                        @auth
                        <a href="{{ route('produkts.show', $produkts->id) }}" class="btn btn-blue">Apskatīt vairāk</a>

                        <form action="{{ route('grozs.pievienot') }}" method="POST" style="margin: 0;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $produkts->id }}">
                            <input type="hidden" name="nosaukums" value="{{ $produkts->name }}">
                            <input type="hidden" name="cena" value="{{ $produkts->cena }}">
                            <button type="submit" class="btn btn-green">Pievienot grozam</button>
                        </form>
                        @endauth
                        @guest
                            <p class="auth-message">Lai aplūkotu produktus vai pievienotu tos grozam, lūdzu <a href="{{ route('login') }}" style="color: #3b82f6;">pieslēdzieties</a>.</p>
                        @endguest
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="no-products">Šajā kategorijā produktu nav.</p>
    @endif
</div>
@endsection
