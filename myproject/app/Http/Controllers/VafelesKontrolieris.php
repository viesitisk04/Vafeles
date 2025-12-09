<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VafelesKontrolieris extends Controller
{
    public function sakums()
    {
        $vafeles = [
            ['name' => 'Klasiskā burbuļvafele', 'price' => 4.99, 'description' => 'Kraukšķīga malās, mīksta un silta vidū.'],
            ['name' => 'Šokolādes burbuļvafele', 'price' => 6.49, 'description' => 'Bagātīga kakao garša ar šokolādes gabaliņiem.'],
            ['name' => 'Zemeņu burbuļvafele', 'price' => 6.79, 'description' => 'Pildīta ar svaigām, saldām zemenēm un putukrējumu.'],
            ['name' => 'Oreo burbuļvafele', 'price' => 7.20, 'description' => 'Sasmalcināti Oreo cepumi un vaniļas krēms.'],
            ['name' => 'Banānu-karameļu burbuļvafele', 'price' => 7.50, 'description' => 'Banāni, karamele un silta vafele — ideāla kombinācija.'],
        ];

        return view('sakums', compact('vafeles'));
    }

    public function kontakti()
    {
        return view('kontakti');
    }

    public function sutitZinu(Request $request)
    {
        $request->validate([
            'vards' => 'required',
            'epasts' => 'required|email',
            'zina' => 'required|min:5'
        ]);

        // Te varētu pievienot e-pasta sūtīšanu, saglabāšanu DB utt.

        return redirect()->route('kontakti')->with('success', 'Jūsu ziņa veiksmīgi nosūtīta!');
    }
}
