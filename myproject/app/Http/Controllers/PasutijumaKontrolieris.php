<?php

namespace App\Http\Controllers;

use App\Models\Pasutijums;
use App\Models\PasutijumaProdukts;
use Illuminate\Support\Facades\Auth;
use App\Mail\RekinsMail;
use Illuminate\Support\Facades\Mail;

class PasutijumaKontrolieris extends Controller
{
        // Saglabā lietotāja pasūtījumu un nosūta rēķinu uz e-pastu
    public function saglabat()
    {
        $grozs = session('grozs');

        if (!$grozs || empty($grozs)) {
            return back()->with('error', 'Grozs ir tukšs');
        }

        $kopa = 0;
        foreach ($grozs as $produkts) {
            $kopa += $produkts['cena'] * $produkts['daudzums'];
        }

        $pasutijums = Pasutijums::create([
            'user_id' => Auth::id(),
            'kopa' => $kopa,
        ]);

        foreach ($grozs as $produkts) {
            PasutijumaProdukts::create([
                'pasutijums_id' => $pasutijums->id,
                'nosaukums' => $produkts['nosaukums'],
                'cena' => $produkts['cena'],
                'daudzums' => $produkts['daudzums'],
            ]);
        }

        Mail::to(auth()->user()->email)
            ->bcc('vkalnins88@gmail.com')
            ->send(new RekinsMail($pasutijums));

        session()->forget('grozs');

        return redirect('/kategorija/vafeles')
            ->with('success', 'Paldies! Pasūtījums ir veikts. Rēķins nosūtīts uz Jūsu E-pastu');
    }
}
