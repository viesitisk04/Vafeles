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

    .error-message {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        border: 1px solid #dc2626;
        color: #991b1b;
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
        margin-bottom: 3rem;
        font-weight: 500;
    }

    .users-table {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .users-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .users-table th {
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

    .users-table td {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        color: #6b7280;
    }

    .users-table tbody tr:hover {
        background: #f9fafb;
    }

    .user-name {
        font-weight: 600;
        color: #111827;
    }

    .user-email {
        color: #6b7280;
    }

    .admin-badge {
        background: #fef3c7;
        color: #92400e;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-delete:hover {
        background: #dc2626;
        transform: translateY(-1px);
    }

    .btn-admin {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-right: 0.5rem;
    }

    .btn-admin:hover {
        background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        transform: translateY(-1px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .admin-container {
            padding: 1rem;
        }

        .admin-title {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .users-table {
            overflow-x: auto;
        }

        .users-table table {
            min-width: 600px;
        }

        .users-table th,
        .users-table td {
            padding: 1rem;
        }

        .user-name {
            font-size: 0.875rem;
        }

        .user-email {
            font-size: 0.875rem;
        }

        .btn-delete {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        .admin-title {
            font-size: 1.75rem;
        }

        .users-table th,
        .users-table td {
            padding: 0.75rem;
        }

        .user-name {
            font-size: 0.75rem;
        }

        .user-email {
            font-size: 0.75rem;
        }

        .admin-badge {
            font-size: 0.625rem;
            padding: 0.125rem 0.375rem;
        }

        .btn-admin {
            padding: 0.25rem 0.5rem;
            font-size: 0.625rem;
            margin-right: 0.25rem;
        }

        .btn-delete {
            padding: 0.25rem 0.5rem;
            font-size: 0.625rem;
        }
    }
</style>

<div class="admin-container">
    <h1 class="admin-title">Lietotāju pārvaldība</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <div class="users-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>E-pasts</th>
                    <th>Administrators</th>
                    <th>Darbības</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lietotaji as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td class="user-name">{{ $u->name }}</td>
                        <td class="user-name">{{ $u->surname }}</td>
                        <td class="user-email">{{ $u->email }}</td>
                        <td>
                            @if($u->is_admin)
                                <span class="admin-badge">Jā</span>
                            @else
                                Nē
                            @endif
                        </td>
                        <td>
                            @if(Auth::id() !== $u->id)
                                <form method="POST" action="{{ route('admin.lietotaji.padarit-admin', $u->id) }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn-admin">
                                        @if($u->is_admin)
                                            Noņemt administratora tiesības
                                        @else
                                            Padarīt par administratoru
                                        @endif
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.lietotaji.dzest', $u->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Dzēst lietotāju?')">
                                        Dzēst
                                    </button>
                                </form>
                            @else
                                —
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
