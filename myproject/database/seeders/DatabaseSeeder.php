<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategorija;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    public function run(): void
    {
        Kategorija::updateOrCreate([
            'slug' => 'vafeles'
        ], [
            'name' => 'Vafeles',
            'slug' => 'vafeles',
        ]);
        Kategorija::updateOrCreate([
            'slug' => 'uzkodas'
        ], [
            'name' => 'Uzkodas',
            'slug' => 'uzkodas',
        ]);
        Kategorija::updateOrCreate([
            'slug' => 'dzerieni'
        ], [
            'name' => 'Dzērieni',
            'slug' => 'dzerieni',
        ]);

        $admin = \App\Models\User::where('email', 'admin@vafeles.lv')->first();
        if (!$admin) {
            \App\Models\User::create([
                'name' => 'Admins',
                'surname' => 'Administrators',
                'email' => 'admin@vafeles.lv',
                'password' => bcrypt('parole123'),
                'is_admin' => true,
            ]);
        }

        $user = \App\Models\User::where('email', 'kalninsjuris41@gmail.com')->first();
        if ($user) {
            $user->is_admin = true;
            $user->save();
        } else {
            \App\Models\User::create([
                'name' => 'Juris',
                'surname' => 'Kalniņš',
                'email' => 'kalninsjuris41@gmail.com',
                'password' => bcrypt('parole123'),
                'is_admin' => true,
            ]);
        }
    }
}
