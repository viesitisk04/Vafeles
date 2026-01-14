<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produkts;

class Kategorija extends Model
{
    // Tabulas nosaukums datubāzē
    protected $table = 'kategorijas';

    // Masīvs ar laukiem, kurus drīkst masveidā aizpildīt
    protected $fillable = [
        'name',
        'slug',
    ];

    // Atgriež kategorijas produktus (relācija)
    public function produkti()
    {
        return $this->hasMany(Produkts::class);
    }
}
