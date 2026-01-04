@extends('layouts.app')

@section('content')
<style>
    .cart-empty {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 3rem;
        text-align: center;
        margin-top: 2rem;
    }

    .cart-empty p {
        color: #6b7280;
        font-size: 1.25rem;
        margin-bottom: 2rem;
    }

    .btn-shop {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-shop:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.4);
    }

    .cart-table {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .cart-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .cart-table th {
        background: #f9fafb;
        padding: 1rem 1.5rem;
        text-align: left;
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1px solid #e5e7eb;
    }

    .cart-table td {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .cart-table tbody tr:last-child td {
        border-bottom: none;
    }

    .product-name {
        font-weight: 600;
        color: #111827;
        font-size: 1.125rem;
    }

    .price {
        color: #6b7280;
        font-weight: 500;
    }

    .quantity-form {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .quantity-input {
        width: 5rem;
        padding: 0.5rem;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        text-align: center;
        font-size: 1rem;
    }

    .btn-update {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        border: none;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-update:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px rgba(16, 185, 129, 0.4);
    }

    .total-price {
        color: #16a34a;
        font-weight: 600;
        font-size: 1.125rem;
    }

    .btn-delete {
        color: #dc2626;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        border: 1px solid #dc2626;
    }

    .btn-delete:hover {
        background-color: #dc2626;
        color: white;
        transform: translateY(-1px);
    }

    .cart-total {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .auth-message {
        color: #6b7280;
        font-size: 0.875rem;
        text-align: center;
        margin-top: 1rem;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .total-label {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
    }

    .total-amount {
        font-size: 1.5rem;
        font-weight: 700;
        color: #16a34a;
    }

    .btn-checkout {
        width: 100%;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        text-align: center;
        font-weight: 600;
        transition: all 0.3s ease;
        display: block;
        font-size: 1.125rem;
    }

    .btn-checkout:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(245, 158, 11, 0.4);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 3rem;
        color: #1f2937;
        text-align: center;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 0 1rem;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .cart-empty {
            padding: 2rem;
        }

        .cart-empty p {
            font-size: 1rem;
        }

        .cart-table {
            overflow-x: auto;
        }

        .cart-table table {
            min-width: 600px;
        }

        .cart-table th,
        .cart-table td {
            padding: 1rem;
        }

        .product-name {
            font-size: 1rem;
        }

        .quantity-form {
            flex-direction: column;
            gap: 0.5rem;
        }

        .quantity-input {
            width: 100%;
        }

        .cart-total {
            padding: 1.5rem;
        }

        .total-row {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .total-label,
        .total-amount {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 1.75rem;
        }

        .cart-empty {
            padding: 1.5rem;
        }

        .cart-empty p {
            font-size: 0.875rem;
        }

        .cart-table th,
        .cart-table td {
            padding: 0.75rem;
        }

        .product-name {
            font-size: 0.875rem;
        }

        .price {
            font-size: 0.875rem;
        }

        .btn-update,
        .btn-delete {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
        }

        .cart-total {
            padding: 1rem;
        }

        .total-label,
        .total-amount {
            font-size: 1rem;
        }

        .btn-checkout {
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
        }

        .auth-message {
            font-size: 0.75rem;
        }
    }
</style>

<div class="container">
    <h1 class="page-title">Tavs grozs</h1>

    @if(empty($grozs))
        <div class="cart-empty">
            <p>Grozs ir tukšs.</p>
            <a href="{{ route('sakums') }}" class="btn-shop">Turpināt iepirkšanos</a>
        </div>
    @else
        <div class="cart-table">
            <table>
                <thead>
                    <tr>
                        <th>Produkts</th>
                        <th>Cena</th>
                        <th>Daudzums</th>
                        <th>Kopā</th>
                        <th>Darbības</th>
                    </tr>
                </thead>
                <tbody>
                    @php $kopa = 0; @endphp
                    @foreach($grozs as $id => $produkts)
                        @php
                            $summa = $produkts['cena'] * $produkts['daudzums'];
                            $kopa += $summa;
                        @endphp
                        <tr>
                            <td class="product-name">{{ $produkts['nosaukums'] }}</td>
                            <td class="price">€{{ number_format($produkts['cena'], 2) }}</td>
                            <td>
                                <form action="{{ route('grozs.atjauninat') }}" method="POST" class="quantity-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="daudzums" min="1" value="{{ $produkts['daudzums'] }}" class="quantity-input">
                                    <button type="submit" class="btn-update">Atjaunināt</button>
                                </form>
                            </td>
                            <td class="total-price">€{{ number_format($summa, 2) }}</td>
                            <td>
                                <form action="{{ route('grozs.dzest') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="btn-delete">Dzēst</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cart-total">
            <div class="total-row">
                <span class="total-label">Kopā:</span>
                <span class="total-amount">€{{ number_format($kopa, 2) }}</span>
            </div>
            @if(!empty($grozs))
                @auth
                    <form method="POST" action="{{ route('pasutit') }}">
                        @csrf
                        <button class="btn-checkout">Pasūtīt</button>
                    </form>
                @endauth
                @guest
                    <div class="auth-message">
                        Lai veiktu pasūtījumu, lūdzu <a href="{{ route('login') }}" style="color: #3b82f6;">pieslēdzieties</a>.
                    </div>
                @endguest
            @endif
        </div>
    @endif
</div>
@endsection
