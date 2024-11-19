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
            ['name' => '本社ダイナ'],
            ['name' => 'キャンター'],
            ['name' => 'ダイナ'],
            ['name' => '自走可'],
        ]);
    }
}
