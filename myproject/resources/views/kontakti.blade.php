{{--
    Šis fails attēlo kontaktinformāciju un kontaktformu, izmantojot Blade sintaksi un pielāgotu CSS.
    Iekļauj uzņēmuma informāciju un iespēju nosūtīt ziņu.
--}}
@extends('layouts.app')

@section('content')
<style>
    .contact-info {
        text-align: center;
        margin-bottom: 3rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .company-name {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #1f2937;
    }

    .contact-detail {
        color: #6b7280;
        margin-bottom: 0.5rem;
        font-size: 1.125rem;
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

    .form-container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .form-title {
        font-size: 1.75rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        color: #1f2937;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        color: #374151;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.125rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        font-size: 1rem;
        box-sizing: border-box;
    }

    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .error-message {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.125rem;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.4);
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
        margin-bottom: 3rem;
        color: #1f2937;
    }

    /* Atsaucīgs dizains */
    @media (max-width: 768px) {
        .container {
            padding: 0 1rem;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .contact-info {
            padding: 1.5rem;
        }

        .company-name {
            font-size: 1.5rem;
        }

        .contact-detail {
            font-size: 1rem;
        }

        .form-container {
            padding: 1.5rem;
        }

        .form-title {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 1.75rem;
        }

        .contact-info {
            padding: 1rem;
        }

        .company-name {
            font-size: 1.25rem;
        }

        .contact-detail {
            font-size: 0.875rem;
        }

        .form-container {
            padding: 1rem;
        }

        .form-title {
            font-size: 1.25rem;
        }

        .btn-submit {
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
        }
    }
</style>

<div class="container">
    <h1 class="page-title">Kontakti</h1>

    <div class="contact-info">
        <p class="company-name">SIA "Vafeles"</p>
        <p class="contact-detail">Reg. nr.: 40203661043</p>
        <p class="contact-detail">Adrese: Rīga, Daugavgrīvas iela 74A - 99, LV-1007</p>
        <p class="contact-detail">Talrunis: +371 28100382</p>
        <p class="contact-detail">E-pasts: info@vafeles.lv</p>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-container">
        <h2 class="form-title">Sazinies ar mums</h2>

        <form method="POST" action="{{ route('kontakti.sutit') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Vārds:</label>
                <input type="text" name="vards" value="{{ old('vards') }}" class="form-input">
                @error('vards') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">E-pasts:</label>
                <input type="email" name="epasts" value="{{ old('epasts') }}" class="form-input">
                @error('epasts') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Ziņojums:</label>
                <textarea name="zinojums" class="form-input form-textarea">{{ old('zinojums') }}</textarea>
                @error('zinojums') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn-submit">Sūtīt</button>
        </form>
    </div>
</div>
@endsection
