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

    .form-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-bottom: 3rem;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: #1f2937;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        display: block;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-input, .form-select, .form-textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        box-sizing: border-box;
    }

    .form-input:focus, .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 100px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
    }

    .table-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table-title {
        font-size: 1.5rem;
        font-weight: 600;
        padding: 1.5rem;
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
        color: #1f2937;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-table th {
        background: #f3f4f6;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
    }

    .product-table td {
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        color: #6b7280;
    }

    .product-table tr:hover {
        background: #f9fafb;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-delete:hover {
        background: #dc2626;
    }

    .btn-edit {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
        margin-right: 0.5rem;
        text-decoration: none;
        display: inline-block;
    }

    .btn-edit:hover {
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

        .form-section {
            padding: 1.5rem;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .table-section {
            overflow-x: auto;
        }

        .product-table {
            min-width: 600px;
        }

        .btn-delete {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
        }

        .btn-edit {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
            margin-right: 0.25rem;
        }
    }

    @media (max-width: 480px) {
        .admin-title {
            font-size: 1.75rem;
        }

        .form-section {
            padding: 1rem;
        }

        .form-title {
            font-size: 1.25rem;
        }

        .btn-submit {
            width: 100%;
        }

        .btn-delete {
            padding: 0.25rem 0.5rem;
            font-size: 0.625rem;
        }

        .btn-edit {
            padding: 0.25rem 0.5rem;
            font-size: 0.625rem;
            margin-right: 0.125rem;
        }
    }
</style>

<div class="admin-container">
    <h1 class="admin-title">Produktu pārvaldība</h1>

    <!-- Add new product form -->
    <div class="form-section">
        <h2 class="form-title">Pievienot jaunu produktu</h2>
        <form method="POST" action="{{ route('admin.produkti.pievienot') }}">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Nosaukums</label>
                    <input type="text" name="name" required class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Cena (€)</label>
                    <input type="number" step="0.01" name="cena" required class="form-input">
                </div>
                <div class="form-group" style="grid-column: span 2;">
                    <label class="form-label">Apraksts</label>
                    <textarea name="apraksts" class="form-textarea"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Kategorija</label>
                    <select name="kategorija_id" required class="form-select">
                        @foreach($kategorijas as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Sastāvs</label>
                    <input type="text" name="sastavs" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Enerģētiskā vērtība</label>
                    <input type="text" name="energija" class="form-input">
                </div>
                <div class="form-group" style="grid-column: span 2;">
                    <label class="form-label">Bildes URL</label>
                    <input type="url" name="attels" class="form-input">
                </div>
            </div>
            <button type="submit" class="btn-submit">Pievienot produktu</button>
        </form>
    </div>

    <!-- Products list -->
    <div class="table-section">
        <h2 class="table-title">Produktu saraksts</h2>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Nosaukums</th>
                    <th>Cena</th>
                    <th>Kategorija</th>
                    <th>Darbības</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produkti as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>€{{ number_format($p->cena, 2) }}</td>
                        <td>{{ $p->kategorija->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.produkti.edit', $p->id) }}" class="btn-edit">Rediģēt</a>
                            <form method="POST" action="{{ route('admin.produkti.dzest', $p->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Vai tiešām dzēst?')">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
