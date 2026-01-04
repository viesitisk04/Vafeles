@extends('layouts.app')

@section('content')
<style>
    .admin-container {
        max-width: 800px;
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

    .btn-cancel {
        background: #6b7280;
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-left: 1rem;
    }

    .btn-cancel:hover {
        background: #4b5563;
        transform: translateY(-2px);
    }

    .form-actions {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
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

        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-cancel {
            margin-left: 0;
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

        .btn-submit, .btn-cancel {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="admin-container">
    <h1 class="admin-title">Rediģēt produktu</h1>

    <div class="form-section">
        <h2 class="form-title">Produkta informācija</h2>

        <form method="POST" action="{{ route('admin.produkti.update', $produkts->id) }}">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Nosaukums *</label>
                    <input type="text" name="name" value="{{ old('name', $produkts->name) }}" class="form-input" required>
                    @error('name') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Cena (€) *</label>
                    <input type="number" step="0.01" name="cena" value="{{ old('cena', $produkts->cena) }}" class="form-input" required>
                    @error('cena') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Kategorija *</label>
                    <select name="kategorija_id" class="form-select" required>
                        <option value="">Izvēlieties kategoriju</option>
                        @foreach($kategorijas as $k)
                            <option value="{{ $k->id }}" {{ old('kategorija_id', $produkts->kategorija_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategorija_id') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Apraksts</label>
                    <textarea name="apraksts" class="form-input form-textarea">{{ old('apraksts', $produkts->apraksts) }}</textarea>
                    @error('apraksts') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Sastāvs</label>
                    <input type="text" name="sastavs" value="{{ old('sastavs', $produkts->sastavs) }}" class="form-input">
                    @error('sastavs') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Enerģētiskā vērtība</label>
                    <input type="text" name="energija" value="{{ old('energija', $produkts->energija) }}" class="form-input">
                    @error('energija') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form-group" style="grid-column: span 2;">
                    <label class="form-label">Bildes URL</label>
                    <input type="url" name="attels" value="{{ old('attels', $produkts->attels) }}" class="form-input">
                    @error('attels') <p class="error-message">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Saglabāt izmaiņas</button>
                <a href="{{ route('admin.produkti') }}" class="btn-cancel">Atcelt</a>
            </div>
        </form>
    </div>
</div>
@endsection