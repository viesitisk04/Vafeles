<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasutijums extends Model
{
    // Tabulas nosaukums datubāzē
    protected $table = 'pasutijumi';

    // Masīvs ar laukiem, kurus drīkst masveidā aizpildīt
    protected $fillable = [
        'user_id',
        'kopa',
    ];

    // Atgriež visus pasūtījuma produktus (relācija)
    public function produkti()
    {
        return $this->hasMany(PasutijumaProdukts::class, 'pasutijums_id');
    }

    // Atgriež lietotāju, kas veicis pasūtījumu (relācija)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
