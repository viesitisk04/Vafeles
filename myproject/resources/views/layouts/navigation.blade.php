<style>
    .navbar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .navbar a {
        color: #fff;
        text-decoration: none;
        margin-right: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 8px 12px;
        border-radius: 5px;
    }

    .navbar a:hover {
        background-color: rgba(255,255,255,0.2);
        transform: translateY(-1px);
        text-decoration: none;
    }

    .navbar .left,
    .navbar .right {
        display: flex;
        align-items: center;
    }

    .navbar button {
        margin-left: 15px;
        padding: 8px 15px;
        background-color: rgba(255,255,255,0.2);
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .navbar button:hover {
        background-color: rgba(255,255,255,0.3);
        transform: translateY(-1px);
    }

    .cart-badge {
        background-color: #ff6b6b;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 0.8em;
        margin-left: 5px;
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 10px 15px;
            flex-direction: column;
            gap: 10px;
        }

        .navbar .left,
        .navbar .right {
            width: 100%;
            justify-content: center;
        }

        .navbar a {
            margin-right: 10px;
            font-size: 14px;
            padding: 6px 8px;
        }

        .navbar button {
            margin-left: 10px;
            padding: 6px 12px;
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .navbar a {
            margin-right: 5px;
            font-size: 12px;
            padding: 4px 6px;
        }

        .navbar button {
            margin-left: 5px;
            padding: 4px 8px;
            font-size: 12px;
        }
    }
</style>

<nav class="navbar">
    <div class="left">
        @php
            $kategorijas = \App\Models\Kategorija::all();
            $grozaSkaits = collect(session('grozs', []))->sum('daudzums');
        @endphp

        @foreach($kategorijas as $kat)
            <a href="{{ route('kategorija.show', $kat->slug) }}">
                {{ $kat->name }}
            </a>
        @endforeach

        <a href="{{ route('kontakti.index') }}">Kontakti</a>

        <a href="{{ route('grozs.index') }}">
            Grozs <span class="cart-badge">{{ $grozaSkaits }}</span>
        </a>
    </div>


    <div class="right">
        @auth
            <a href="{{ route('profile.edit') }}" style="font-weight:700; text-decoration:none;">{{ Auth::user()->name }}</a>

            @if(Auth::user()->is_admin)
                <a href="{{ route('admin.panelis') }}">Admin</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Atteikties</button>
            </form>
        @else
            <a href="{{ route('login') }}">Pieteikties</a>
            <a href="{{ route('register') }}">Reģistrēties</a>
        @endauth
    </div>
</nav>
