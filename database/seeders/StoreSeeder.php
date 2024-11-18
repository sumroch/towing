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
            ['name' => 'K花園', 'group_id' => '1'],
            ['name' => 'K深谷', 'group_id' => '1'],
            ['name' => 'K籠原', 'group_id' => '1'],
            ['name' => 'K秩父', 'group_id' => '1'],
            ['name' => 'K本庄', 'group_id' => '1'],
            ['name' => 'K狭山', 'group_id' => '1'],
            ['name' => 'K太田小舞', 'group_id' => '1'],
            ['name' => 'K太田藤阿', 'group_id' => '1'],
            ['name' => 'K足利', 'group_id' => '1'],
            ['name' => 'J花園', 'group_iJ' => '2'],
            ['name' => 'J本庄', 'group_id' => '2'],
            ['name' => 'F7足利', 'group_id' => '2'],
            ['name' => 'F7秩父', 'group_id' => '2'],
            ['name' => 'F7狭山', 'group_id' => '2'],
            ['name' => 'KEI川越', 'group_id' => '2'],
            ['name' => 'KEI太田藤阿', 'group_id' => '2'],
            ['name' => 'KEI籠原', 'group_id' => '2'],
            ['name' => 'KEI熊谷', 'group_id' => '2'],
            ['name' => 'M寄居', 'group_id' => '3'],
            ['name' => 'M本庄', 'group_id' => '3'],
            ['name' => 'M狭山', 'group_id' => '3'],
            ['name' => 'M太田小舞', 'group_id' => '3'],
            ['name' => '笠幡SS', 'group_id' => '4'],
            ['name' => '深谷SS', 'group_id' => '4'],
            ['name' => '狭山SS', 'group_id' => '4'],
            ['name' => '熊谷ハSS', 'group_id' => '4'],
            ['name' => '花園SS', 'group_id' => '4'],
            ['name' => '熊谷SS', 'group_id' => '4'],
            ['name' => '台坂SS', 'group_id' => '4'],
            ['name' => '笹井SS', 'group_id' => '4'],
            ['name' => 'イセSS', 'group_id' => '4'],
        ]);
    }
}
