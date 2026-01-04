<?php

namespace App\Http\Controllers;

use App\Models\Pasutijums;

class AdminPasutijumuKontrolieris extends Controller
{
    public function index()
    {
        $pasutijumi = Pasutijums::with('produkti', 'user')
            ->latest()
            ->get();

        return view('admin.pasutijumi', compact('pasutijumi'));
    }

    public function dzest($id)
    {
        Pasutijums::findOrFail($id)->delete();

        return back()->with('success', 'Pasūtījums dzēsts');
    }
}
