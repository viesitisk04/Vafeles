<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasutijumaProdukts extends Model
{
    // Tabulas nosaukums datubāzē
    protected $table = 'pasutijumu_produkti';

    // Masīvs ar laukiem, kurus drīkst masveidā aizpildīt
    protected $fillable = [
        'pasutijums_id',
        'nosaukums',
        'cena',
        'daudzums',
    ];
}
