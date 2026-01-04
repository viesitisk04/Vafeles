<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategorija;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Add default categories
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

        // User::factory(10)->create();

        // Create admin user if not exists
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

        // Promote kalninsjuris41@gmail.com to admin if exists, else create
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

        // TODO: Restore previous products here if you have a backup or list
    }
}
