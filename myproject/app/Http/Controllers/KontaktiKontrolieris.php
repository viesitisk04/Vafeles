<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KontaktuZinaMail;

class KontaktiKontrolieris extends Controller
{
        // Parāda kontaktu lapu ar formu
    public function index()
    {
        return view('kontakti');
    }

        // Apstrādā kontaktformas iesniegšanu un nosūta ziņu uz e-pastu
    public function sutit(Request $request)
    {
        $request->validate([
            'vards' => 'required',
            'epasts' => 'required|email',
            'zinojums' => 'required|min:5'
        ]);

        Mail::to('vkalnins88@gmail.com')->send(new KontaktuZinaMail($request->all()));

        return back()->with('success', 'Zina veiksmigi nosutita!');
    }
}
