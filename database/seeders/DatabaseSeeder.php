<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(IndustrySeeder::class);
        $this->call(UserCategorySeeder::class);

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'type' => 'admin',
            'email' => 'admin@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Empresa prueba',
            'type' => 'company',
            'industry_id' => 1,
            'email' => 'empresa@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Usuario prueba',
            'type' => 'employee',
            'user_category_id' => 1,
            'email' => 'empleado@example.com',
        ]);

        $this->call(OfferSeeder::class);
    }
}
