<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasutijumaProdukts extends Model
{
    protected $table = 'pasutijumu_produkti';

    protected $fillable = [
        'pasutijums_id',
        'nosaukums',
        'cena',
        'daudzums',
    ];
}
