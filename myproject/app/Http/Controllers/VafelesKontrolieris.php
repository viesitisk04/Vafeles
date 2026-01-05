<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VafelesKontrolieris extends Controller
{
    private $vafeles = [
        ['id' => 1, 'name' => 'Šokolādes burbuļvafele', 'description' => 'Gards šokolādes deserts.', 'price' => 4.50, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg', 'ingredients' => ['Milti', 'Piens', 'Olas', 'Zemenes', 'Putukrējums'],'energy' => '300 kcal'],
        ['id' => 2, 'name' => 'Zemeņu burbuļvafele', 'description' => 'Ar svaigām zemenēm un putukrējumu.', 'price' => 5.00, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg', 'ingredients' => ['Milti', 'Piens', 'Olas', 'Zemenes', 'Putukrējums'],'energy' => '300 kcal'],
        ['id' => 3, 'name' => 'Karameļu burbuļvafele', 'description' => 'Pārklāta ar karameļu mērci.', 'price' => 4.80, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 4, 'name' => 'Oreo burbuļvafele', 'description' => 'Ar kraukšķīgiem Oreo gabaliņiem.', 'price' => 5.20, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 5, 'name' => 'Meža ogu burbuļvafele', 'description' => 'Ar mellenēm, avenēm un kazenēm.', 'price' => 5.10, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 6, 'name' => 'Banānu burbuļvafele', 'description' => 'Ar banānu šķēlītēm un šokolādi.', 'price' => 4.70, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 7, 'name' => 'Nutella burbuļvafele', 'description' => 'Pildīta ar Nutella krēmu.', 'price' => 5.30, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
        ['id' => 10,'name' => 'Klasiskā burbuļvafele', 'description' => 'Vienkārša un garšīga.', 'price' => 4.00, 'image' => 'https://www.dateks.lv/images/pic/2400/2400/811/1499.jpg'],
    ];

        // Pāradresē uz vafeļu kategorijas lapu
    public function index()
    {
        return redirect('/kategorija/vafeles');
    }

        // Parāda konkrētas vafeles detaļas
    public function show($id)
    {
        $vafele = collect($this->vafeles)->firstWhere('id', $id);

        if (!$vafele) {
            abort(404);
        }

        return view('vafele', compact('vafele'));
    }
}
