<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::insert([
            ['name' => 'Ashikaga', 'group_id' => '1'],
            ['name' => 'Chichibu', 'group_id' => '1'],
            ['name' => 'Sayama', 'group_id' => '1'],
            ['name' => 'Kasahata', 'group_id' => '2'],
            ['name' => 'Fujiagu', 'group_id' => '2'],
            ['name' => 'Kagohara', 'group_id' => '2'],
            ['name' => 'Harajima', 'group_id' => '2'],
            ['name' => 'Hanazono', 'group_id' => '3'],
            ['name' => 'Honjo', 'group_id' => '3'],
        ]);
    }
}
