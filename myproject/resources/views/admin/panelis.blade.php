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

    .admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .admin-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }

    .admin-card:hover {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }

    .admin-card h2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #3b82f6;
    }

    .admin-card p {
        color: #6b7280;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }

    .admin-card a {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .admin-card a:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
    }

    @media (max-width: 768px) {
        .admin-container {
            padding: 1rem;
        }

        .admin-title {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .admin-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .admin-card {
            padding: 1.5rem;
        }

        .admin-card h2 {
            font-size: 1.25rem;
        }

        .admin-card p {
            font-size: 0.875rem;
        }

        .admin-card a {
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
        }
    }

    @media (max-width: 480px) {
        .admin-title {
            font-size: 1.75rem;
        }

        .admin-card {
            padding: 1rem;
        }

        .admin-card h2 {
            font-size: 1.125rem;
        }
    }
</style>

<div class="admin-container">
    <h1 class="admin-title">Administrācijas panelis</h1>

    <div class="admin-grid">
        <div class="admin-card">
            <h2>Produkti</h2>
            <p>Pārvaldīt produktus - pievienot, rediģēt, dzēst</p>
            <a href="{{ route('admin.produkti') }}">Pārvaldīt</a>
        </div>

        <div class="admin-card">
            <h2>Pasūtījumi</h2>
            <p>Skatīt un pārvaldīt pasūtījumus.</p>
            <a href="{{ route('admin.pasutijumi') }}">Pārvaldīt</a>
        </div>

        <div class="admin-card">
            <h2>Lietotāji</h2>
            <p>Skatīt un pārvaldīt lietotājus.</p>
            <a href="{{ route('admin.lietotaji') }}">Pārvaldīt</a>
        </div>
    </div>
</div>
@endsection
