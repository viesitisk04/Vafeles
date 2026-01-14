<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // Masīvs ar laukiem, kurus drīkst masveidā aizpildīt
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'is_admin',
    ];

    // Masīvs ar laukiem, kas netiek rādīti serializācijā
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Definē, kādiem tipiem jābūt noteiktiem laukiem
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }
}
