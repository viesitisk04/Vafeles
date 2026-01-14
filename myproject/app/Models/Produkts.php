<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategorija;

class Produkts extends Model
{
    use HasFactory;

    // Tabulas nosaukums datubāzē
    protected $table = 'produkti';

    // Masīvs ar laukiem, kurus drīkst masveidā aizpildīt
    protected $fillable = [
        'name',
        'apraksts',
        'sastavs',
        'cena',
        'attels',
        'energija',
        'kategorija_id',
    ];

    // Atgriež produkta kategoriju (relācija)
    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class);
    }
}
