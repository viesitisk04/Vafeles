<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KontaktuZinaMail;

class KontaktiKontrolieris extends Controller
{
    public function forma()
    {
        return view('kontakti');
    }

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
