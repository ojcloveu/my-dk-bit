<?php

namespace Database\Seeders;

use App\Models\Betting;
use Illuminate\Database\Seeder;

class BettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Betting::factory()->count(5)->create();
    }
}
