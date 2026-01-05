<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrozsKontrolieris extends Controller
{
        // Parāda lietotāja groza saturu
    public function index()
    {
        $grozs = session()->get('grozs', []);
        return view('grozs.index', compact('grozs'));
    }

        // Pievieno produktu grozam
    public function pievienot(Request $request)
    {
        $grozs = session()->get('grozs', []);
        $id = $request->id;

        if (isset($grozs[$id])) {
            $grozs[$id]['daudzums']++;
        } else {
            $grozs[$id] = [
                'nosaukums' => $request->nosaukums,
                'cena' => $request->cena,
                'daudzums' => 1,
            ];
        }

        session()->put('grozs', $grozs);

        return back();
    }

        // Atjaunina produkta daudzumu grozā
    public function atjauninat(Request $request)
    {
        $grozs = session()->get('grozs');

        if (isset($grozs[$request->id])) {
            $grozs[$request->id]['daudzums'] = $request->daudzums;
            session()->put('grozs', $grozs);
        }

        return back();
    }

    public function dzest(Request $request)
    {
        $grozs = session()->get('grozs');

        if (isset($grozs[$request->id])) {
            unset($grozs[$request->id]);
            session()->put('grozs', $grozs);
        }

        return back();
    }
}
