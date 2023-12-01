<?php

namespace Database\Seeders;

use App\Models\ItemLocation;
use Illuminate\Database\Seeder;

class ItemLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemLocation::factory()
            ->count(5)
            ->create();
    }
}
