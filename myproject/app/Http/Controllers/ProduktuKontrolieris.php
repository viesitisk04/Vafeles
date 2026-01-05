<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use App\Models\Produkts;

class ProduktuKontrolieris extends Controller
{
        // Parāda produktu sarakstu izvēlētajā kategorijā
    public function kategorija($slug)
    {
        $kategorija = Kategorija::where('slug', $slug)->firstOrFail();
        $produkti = $kategorija->produkti;

        return view('produkti', compact('kategorija', 'produkti'));
    }
        // Parāda konkrēta produkta detaļas
    public function show($id)
    {
        $produkts = Produkts::findOrFail($id);

        return view('produkts', compact('produkts'));
    }
}
