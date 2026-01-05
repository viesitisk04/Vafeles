<?php

namespace App\Http\Controllers;

class UzkodasKontrolieris extends Controller
{
        // Parāda uzkodu produktu sarakstu
    public function index()
    {
        $uzkodas = [
            ['name' => 'Frī kartupeļi', 'price' => 2.50, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGEJS68KISlGRQfZq48ZK8GI-tQN2fv6oPdA&s'],
            ['name' => 'Sīpolu gredzeni', 'price' => 3.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3iU8CxVboLiZ51X9Jf_Rn0biNjgjO1SAHmg&s'],
            ['name' => 'Vistas nageti', 'price' => 4.20, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9c-x48B0B-XpTzeEYYX_Lo3pZtKNjYKd9Gg&s'],
        ];

        return view('uzkodas', compact('uzkodas'));
    }
}
