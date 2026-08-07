<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Crée (ou met à jour) le compte administrateur à partir des variables
     * ADMIN_NAME / ADMIN_EMAIL / ADMIN_PASSWORD définies dans le .env.
     * Pense à changer le mot de passe par défaut avant toute mise en ligne.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@dorice-djeton.com')],
            [
                'name' => env('ADMIN_NAME', 'Dorice DJETON'),
                'password' => bcrypt(env('ADMIN_PASSWORD', 'change-me-please')),
            ]
        );
    }
}
