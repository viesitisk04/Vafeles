<?php

namespace App\Http\Controllers;

use App\Models\Produkts;
use App\Models\Kategorija;
use Illuminate\Http\Request;

class AdminProduktuKontrolieris extends Controller
{
    public function index()
            // Parāda produktu sarakstu administrācijas panelī
    {
        $produkti = Produkts::with('kategorija')->get();
        $kategorijas = Kategorija::all();

        return view('admin.produkti', compact('produkti', 'kategorijas'));
    }

    public function store(Request $request)
            // Saglabā jaunu produktu
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cena' => 'required|numeric',
            'kategorija_id' => 'required|exists:kategorijas,id',
        ]);

        Produkts::create([
            'name' => $request->name,
            'apraksts' => $request->apraksts,
            'sastavs' => $request->sastavs,
            'energija' => $request->energija,
            'attels' => $request->attels,
            'cena' => $request->cena,
            'kategorija_id' => $request->kategorija_id,
        ]);

        return redirect()->back()->with('success', 'Produkts pievienots');
    }

    public function edit($id)
            // Parāda produkta rediģēšanas formu
    {
        $produkts = Produkts::findOrFail($id);
        $kategorijas = Kategorija::all();

        return view('admin.produkti.edit', compact('produkts', 'kategorijas'));
    }

    public function update(Request $request, $id)
            // Atjauno produkta informāciju
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cena' => 'required|numeric',
            'kategorija_id' => 'required|exists:kategorijas,id',
        ]);

        $produkts = Produkts::findOrFail($id);
        $produkts->update([
            'name' => $request->name,
            'apraksts' => $request->apraksts,
            'sastavs' => $request->sastavs,
            'energija' => $request->energija,
            'attels' => $request->attels,
            'cena' => $request->cena,
            'kategorija_id' => $request->kategorija_id,
        ]);

        return redirect()->route('admin.produkti')->with('success', 'Produkts atjaunināts');
    }

    public function dzest($id)
            // Dzēš produktu
    {
        Produkts::findOrFail($id)->delete();
        return redirect()->back();
    }
}
