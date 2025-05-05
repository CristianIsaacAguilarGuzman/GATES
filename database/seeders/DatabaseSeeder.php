<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Email: admin@admin.com
     * Contraseña: admin123
     * Rol: admin
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);

        $this->call([
            EventoSeeder::class,
        ]);
    }
}
