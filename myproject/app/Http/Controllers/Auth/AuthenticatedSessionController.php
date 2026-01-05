<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
        // Parāda lietotājam pieteikšanās formu
        public function create(): View
    {
        return view('auth.login');
    }
    // Apstrādā lietotāja pieteikšanās pieprasījumu
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();


        if (Auth::user() && Auth::user()->is_admin) {
            return redirect()->route('admin.panelis');
        }

        return redirect()->route('kategorija.show', 'vafeles');

    }

    // Atslēdz lietotāju no sistēmas un izdzēš sesiju
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
