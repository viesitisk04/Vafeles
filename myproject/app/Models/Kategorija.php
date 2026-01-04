<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produkts;

class Kategorija extends Model
{
    protected $table = 'kategorijas';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function produkti()
    {
        return $this->hasMany(Produkts::class);
    }
}
