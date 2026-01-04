<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategorija;

class Produkts extends Model
{
    use HasFactory;

    protected $table = 'produkti';

    protected $fillable = [
        'name',
        'apraksts',
        'sastavs',
        'cena',
        'attels',
        'energija',
        'kategorija_id',
    ];

    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class);
    }

    public function produkti()
    {
        return $this->hasMany(PasutijumaProdukts::class, 'pasutijums_id');
    }
}
