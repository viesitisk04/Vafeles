@extends('layouts.app')

@section('content')
<style>
    .profile-container {
        max-width: 500px;
        margin: 3rem auto;
        padding: 0 1.5rem;
    }
    .profile-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        padding: 2rem;
    }
    .profile-title {
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
        font-size: 1rem;
        box-sizing: border-box;
    }
    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
    }
    .btn-save {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 1rem;
    }
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59,130,246,0.4);
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
</style>
<div class="profile-container">
    <div class="profile-card">
        <h1 class="profile-title">Rediģēt profilu</h1>
        @if(session('status'))
            <div class="status-message">
                Kontaktinformācija saglabāta!
            </div>
        @endif
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label class="form-label" for="name">Vārds</label>
                <input id="name" class="form-input" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus />
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="surname">Uzvārds</label>
                <input id="surname" class="form-input" type="text" name="surname" value="{{ old('surname', $user->surname) }}" required />
                @error('surname')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="email">E-pasts</label>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn-save">Saglabāt izmaiņas</button>
        </form>
    </div>
</div>
@endsection
