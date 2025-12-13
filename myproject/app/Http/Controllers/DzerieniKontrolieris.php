<?php

namespace App\Http\Controllers;

class DzerieniKontrolieris extends Controller
{
    public function index()
    {
        $dzerieni = [
            ['name' => 'Limonāde 0.5L', 'price' => 1.80, 'image' => 'https://www.picudarbnica.lv/wp-content/uploads/2012/02/0-5-cc-fanta-sprite.jpg'],
            ['name' => 'Sula Cido 0.2L', 'price' => 0.80, 'image' => 'https://img.fix-price.lv/insecure/rs:fit:800:800/plain/bit/_marketplace/images/origin/8c/8cd5177bdbaa9b157010cc89ece2425c.jpg'],
            ['name' => 'Minerālūdens 0.5L', 'price' => 1.20, 'image' => 'https://rimibaltic-res.cloudinary.com/image/upload/b_white,c_limit,dpr_3.0,f_auto,q_auto:low,w_400/d_ecommerce:backend-fallback.png/MAT_1361577_PCE_LV'],
        ];

        return view('dzerieni', compact('dzerieni'));
    }
}
