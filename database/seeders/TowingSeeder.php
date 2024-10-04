<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\Towing;
use Illuminate\Database\Seeder;

class TowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Towing::insert([
            ['name' => 'Towing 1'],
            ['name' => 'Towing 2'],
            ['name' => 'Towing 3'],
            ['name' => 'other'],
        ]);
    }
}
