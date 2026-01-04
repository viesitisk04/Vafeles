@extends('layouts.app')

@section('content')
<style>
    .auth-container {
        max-width: 400px;
        margin: 4rem auto;
        padding: 0 1.5rem;
    }

    .auth-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .auth-title {
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        color: #1f2937;
    }

    .auth-description {
        text-align: center;
        color: #6b7280;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .status-message {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        border: 1px solid #10b981;
        color: #065f46;
        padding: 1rem;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 2rem;
        font-weight: 500;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        color: #374151;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1rem;
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

    .error-message {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .auth-footer {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .btn-submit {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.4);
    }

    .auth-links {
        text-align: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
    }

    .auth-links a {
        color: #6b7280;
        text-decoration: none;
        font-size: 0.875rem;
        transition: color 0.3s ease;
    }

    .auth-links a:hover {
        color: #3b82f6;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .auth-container {
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .auth-card {
            padding: 1.5rem;
        }

        .auth-title {
            font-size: 1.75rem;
        }

        .auth-footer {
            text-align: center;
        }

        .btn-submit {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .auth-container {
            margin: 1rem auto;
        }

        .auth-card {
            padding: 1rem;
        }

        .auth-title {
            font-size: 1.5rem;
        }

        .form-input {
            padding: 0.625rem 0.875rem;
        }

        .btn-submit {
            padding: 0.625rem 1.5rem;
            font-size: 0.875rem;
        }

        .auth-links a {
            font-size: 0.75rem;
        }
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <h1 class="auth-title">Aizmirsi paroli?</h1>

        <p class="auth-description">
            Nekādu problēmu. Ievadi savu e-pasta adresi, un mēs nosūtīsim saiti paroles atjaunošanai.
        </p>

        @if(session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">E-pasts</label>
                <input id="email" class="form-input"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required autofocus />
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="auth-footer">
                <button type="submit" class="btn-submit">
                    Nosūtīt paroles atjaunošanas saiti
                </button>
            </div>
        </form>

        <div class="auth-links">
            <a href="{{ route('login') }}">Atgriezties pie pieteikšanās</a>
        </div>
    </div>
</div>

@endsection
