<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasutijums extends Model
{
    protected $table = 'pasutijumi';

    protected $fillable = [
        'user_id',
        'kopa',
    ];

    public function produkti()
    {
        return $this->hasMany(PasutijumaProdukts::class, 'pasutijums_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
