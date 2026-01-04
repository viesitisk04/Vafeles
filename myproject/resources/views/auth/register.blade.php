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
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
    }

    .login-link {
        color: #3b82f6;
        text-decoration: none;
        font-size: 0.875rem;
        transition: color 0.3s ease;
    }

    .login-link:hover {
        color: #2563eb;
    }

    .btn-submit {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
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
            flex-direction: column;
            gap: 1rem;
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

        .login-link,
        .auth-links a {
            font-size: 0.75rem;
        }
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <h1 class="auth-title">Reģistrēties</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div class="form-group">
                <label class="form-label" for="name">Vārds</label>
                <input id="name" class="form-input"
                       type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required autofocus />
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="surname">Uzvārds</label>
                <input id="surname" class="form-input"
                       type="text"
                       name="surname"
                       value="{{ old('surname') }}"
                       required />
                @error('surname')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="email">E-pasts</label>
                <input id="email" class="form-input"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required />
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Parole</label>
                <input id="password" class="form-input"
                       type="password"
                       name="password"
                       required />
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Apstiprināt paroli</label>
                <input id="password_confirmation" class="form-input"
                       type="password"
                       name="password_confirmation"
                       required />
                @error('password_confirmation')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="auth-footer">
                <a class="login-link" href="{{ route('login') }}">
                    Jau reģistrējies?
                </a>

                <button type="submit" class="btn-submit">
                    Reģistrēties
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
