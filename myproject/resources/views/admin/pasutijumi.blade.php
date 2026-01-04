@extends('layouts.app')

@section('content')
<style>
    .admin-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .admin-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
        color: #1f2937;
    }

    .success-message {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        border: 1px solid #10b981;
        color: #065f46;
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
        margin-bottom: 3rem;
        font-weight: 500;
    }

    .order-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .order-card:hover {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .order-header {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #1f2937;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 0.5rem;
    }

    .order-info {
        margin-bottom: 1.5rem;
        color: #6b7280;
        font-size: 1.125rem;
        line-height: 1.5;
    }

    .order-info strong {
        color: #374151;
        font-weight: 600;
    }

    .products-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #1f2937;
    }

    .products-list {
        list-style: none;
        padding: 0;
        margin-bottom: 2rem;
    }

    .products-list li {
        background: #f9fafb;
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
        border-radius: 6px;
        border-left: 4px solid #3b82f6;
        color: #374151;
        font-weight: 500;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
        font-size: 1rem;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(239, 68, 68, 0.4);
    }

    .no-orders {
        text-align: center;
        color: #6b7280;
        font-size: 1.25rem;
        margin-top: 3rem;
    }

    @media (max-width: 768px) {
        .admin-container {
            padding: 1rem;
        }

        .admin-title {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .order-card {
            padding: 1.5rem;
        }

        .order-header {
            font-size: 1.25rem;
        }

        .order-info {
            font-size: 1rem;
        }

        .products-title {
            font-size: 1.125rem;
        }

        .products-list li {
            font-size: 0.875rem;
            padding: 0.625rem 0.875rem;
        }

        .btn-delete {
            width: 100%;
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
        }
    }

    @media (max-width: 480px) {
        .admin-title {
            font-size: 1.75rem;
        }

        .order-card {
            padding: 1rem;
        }

        .order-header {
            font-size: 1.125rem;
        }

        .order-info {
            font-size: 0.875rem;
        }

        .products-title {
            font-size: 1rem;
        }

        .products-list li {
            font-size: 0.75rem;
            padding: 0.5rem 0.75rem;
        }

        .btn-delete {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }

        .no-orders {
            font-size: 1rem;
        }
    }
</style>

<div class="admin-container">
    <h1 class="admin-title">Pasūtījumu pārvaldība</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($pasutijumi->isEmpty())
        <p class="no-orders">Nav pasūtījumu.</p>
    @else
        @foreach($pasutijumi as $p)
            <div class="order-card">
                <div class="order-header">Pasūtījums #{{ $p->id }}</div>

                <div class="order-info">
                    <strong>Lietotājs:</strong> {{ $p->user->name ?? 'Viesis' }}<br>
                    <strong>Kopā:</strong> €{{ number_format($p->kopa, 2) }}
                </div>

                <h4 class="products-title">Produkti:</h4>
                <ul class="products-list">
                    @foreach($p->produkti as $prod)
                        <li>
                            {{ $prod->nosaukums }}
                            — {{ $prod->daudzums }} × €{{ number_format($prod->cena, 2) }}
                        </li>
                    @endforeach
                </ul>

                <form method="POST" action="{{ route('admin.pasutijumi.dzest', $p->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" onclick="return confirm('Dzēst pasūtījumu?')">
                        Dzēst pasūtījumu
                    </button>
                </form>
            </div>
        @endforeach
    @endif
</div>
@endsection