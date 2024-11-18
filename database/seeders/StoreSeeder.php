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
            ['name' => 'Kobac-Hanazono', 'group_id' => '1'],
            ['name' => 'Kobac-Fukaya', 'group_id' => '1'],
            ['name' => 'Kobac-Kagohara', 'group_id' => '1'],
            ['name' => 'Kobac-Chichibu', 'group_id' => '1'],
            ['name' => 'Kobac-Honjo', 'group_id' => '1'],
            ['name' => 'Kobac-Sayama', 'group_id' => '1'],
            ['name' => 'Kobac-Ota Komaigi', 'group_id' => '1'],
            ['name' => 'Kobac-Ota Fujiagu', 'group_id' => '1'],
            ['name' => 'Kobac-Ashikaga', 'group_id' => '1'],
            ['name' => 'Dealer-Hanazono', 'group_id' => '2'],
            ['name' => 'Dealer-Chichibu', 'group_id' => '2'],
            ['name' => 'Dealer-Honjo', 'group_id' => '2'],
            ['name' => 'Dealer-Fujiagu', 'group_id' => '2'],
            ['name' => 'Dealer-Harajima', 'group_id' => '2'],
            ['name' => 'Dealer-Ashikaga', 'group_id' => '2'],
            ['name' => 'Dealer-Sayama', 'group_id' => '2'],
            ['name' => 'Dealer-Kasahata', 'group_id' => '2'],
            ['name' => 'Dealer-Kagohara', 'group_id' => '2'],
            ['name' => 'Modolly-Yorii', 'group_id' => '3'],
            ['name' => 'Modolly-Honjo', 'group_id' => '3'],
            ['name' => 'Modolly-Sayama', 'group_id' => '3'],
            ['name' => 'Modolly-Komaigi', 'group_id' => '3'],
            ['name' => 'SS-Minami', 'group_id' => '4'],
            ['name' => 'SS-Daisakaue', 'group_id' => '4'],
            ['name' => 'SS-Iseya', 'group_id' => '4'],
            ['name' => 'SS-Kasahata', 'group_id' => '4'],
            ['name' => 'SS-Hanazono', 'group_id' => '4'],
            ['name' => 'SS-Hidaka', 'group_id' => '4'],
            ['name' => 'SS-Ht', 'group_id' => '4'],
            ['name' => 'SS-Sasai', 'group_id' => '4'],
            ['name' => 'SS-Harajima', 'group_id' => '4'],
        ]);
    }
}
