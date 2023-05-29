<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Industry::factory()->forEachSequence(
            ['name' => 'Textil'],
            ['name' => 'Agropecuaria'],
            ['name' => 'Software'],
            ['name' => 'Telecomunicaciones'],
            ['name' => 'Otro'],
        )->create();
    }
}
