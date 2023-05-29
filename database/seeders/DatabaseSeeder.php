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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Empresa prueba',
            'type' => 'company',
            'email' => 'empresa@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Empleado prueba',
            'type' => 'employee',
            'email' => 'empleado@example.com',
        ]);
    }
}
