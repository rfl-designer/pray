<?php

namespace Database\Seeders;

use App\Models\Pray;
use Illuminate\Database\Seeder;

class PraySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pray::factory()->count(50)->create();
    }
}
