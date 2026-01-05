<?php

namespace App\Http\Controllers;

class AdminKontrolieris extends Controller
{
        // Parāda administrācijas paneļa sākuma skatu
    public function panelis()
    {
        return view('admin.panelis');
    }
}
