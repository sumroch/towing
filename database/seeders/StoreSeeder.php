<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::insert([
            ['name' => 'Hanazono', 'group_id' => '1'],
            ['name' => 'Fukaya', 'group_id' => '1'],
            ['name' => 'Chichibu', 'group_id' => '2'],
            ['name' => 'Joykal', 'group_id' => '3'],
            ['name' => 'Honjo', 'group_id' => '3'],
        ]);
    }
}
