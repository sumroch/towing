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
            ['name' => 'K-花園', 'group_id' => '1'],
            ['name' => 'K-深谷', 'group_id' => '1'],
            ['name' => 'K-籠原', 'group_id' => '1'],
            ['name' => 'K-秩父', 'group_id' => '1'],
            ['name' => 'K-本庄', 'group_id' => '1'],
            ['name' => 'K-狭山', 'group_id' => '1'],
            ['name' => 'K-太田小舞', 'group_id' => '1'],
            ['name' => 'K-太田藤阿', 'group_id' => '1'],
            ['name' => 'K-足利', 'group_id' => '1'],
            ['name' => 'D-足利', 'group_id' => '2'],
            ['name' => 'D-秩父', 'group_id' => '2'],
            ['name' => 'D-狭山', 'group_id' => '2'],
            ['name' => 'D-川越', 'group_id' => '2'],
            ['name' => 'D-太田藤阿', 'group_id' => '2'],
            ['name' => 'D-籠原', 'group_id' => '2'],
            ['name' => 'D-熊谷', 'group_id' => '2'],
            ['name' => 'D-花園', 'group_id' => '2'],
            ['name' => 'D-本庄', 'group_id' => '2'],
            ['name' => 'M-寄居', 'group_id' => '3'],
            ['name' => 'M-本庄', 'group_id' => '3'],
            ['name' => 'M-狭山', 'group_id' => '3'],
            ['name' => 'M-太田小舞', 'group_id' => '3'],
            ['name' => 'SS-深谷', 'group_id' => '4'],
            ['name' => 'SS-台坂', 'group_id' => '4'],
            ['name' => 'SS-イセ', 'group_id' => '4'],
            ['name' => 'SS-笠幡', 'group_id' => '4'],
            ['name' => 'SS-花園', 'group_id' => '4'],
            ['name' => 'SS-狭山', 'group_id' => '4'],
            ['name' => 'SS-熊谷', 'group_id' => '4'],
            ['name' => 'SS-笹井', 'group_id' => '4'],
            ['name' => 'SS-熊谷', 'group_id' => '4'],
        ]);
    }
}
