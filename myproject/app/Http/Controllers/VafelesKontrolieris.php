<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VafelesKontrolieris extends Controller
{
    private $vafeles = [
        ['id' => 1, 'name' => 'Šokolādes burbuļvafele', 'description' => 'Gards šokolādes deserts.', 'price' => 4.50, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 2, 'name' => 'Zemeņu burbuļvafele', 'description' => 'Ar svaigām zemenēm un putukrējumu.', 'price' => 5.00, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 3, 'name' => 'Karameļu burbuļvafele', 'description' => 'Pārklāta ar karameļu mērci.', 'price' => 4.80, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 4, 'name' => 'Oreo burbuļvafele', 'description' => 'Ar kraukšķīgiem Oreo gabaliņiem.', 'price' => 5.20, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 5, 'name' => 'Meža ogu burbuļvafele', 'description' => 'Ar mellenēm, avenēm un kazenēm.', 'price' => 5.10, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 6, 'name' => 'Banānu burbuļvafele', 'description' => 'Ar banānu šķēlītēm un šokolādi.', 'price' => 4.70, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 7, 'name' => 'Nutella burbuļvafele', 'description' => 'Pildīta ar Nutella krēmu.', 'price' => 5.30, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 8, 'name' => 'Kokosriekstu burbuļvafele', 'description' => 'Ar kokosriekstu skaidiņām.', 'price' => 4.90, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 9, 'name' => 'Riekstu burbuļvafele', 'description' => 'Pārkaisīta ar grauzdētiem riekstiem.', 'price' => 5.40, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 10,'name' => 'Klasiskā burbuļvafele', 'description' => 'Vienkārša un garšīga.', 'price' => 4.00, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 11, 'name' => 'Riekstu burbuļvafele', 'description' => 'Pārkaisīta ar grauzdētiem riekstiem.', 'price' => 5.40, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 12,'name' => 'Klasiskā burbuļvafele', 'description' => 'Vienkārša un garšīga.', 'price' => 4.00, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
    ];

    public function index()
    {
        $vafeles = $this->vafeles;
        return view('sakums', compact('vafeles'));
    }

    public function show($id)
    {
        $vafele = collect($this->vafeles)->firstWhere('id', $id);

        if (!$vafele) {
            abort(404);
        }

        return view('vafele', compact('vafele'));
    }
}
