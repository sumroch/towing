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
            ['name' => 'K小舞木', 'group_id' => '1'],
            ['name' => 'K藤阿久', 'group_id' => '1'],
            ['name' => 'K足利', 'group_id' => '1'],
            ['name' => 'J花園', 'group_iJ' => '2'],
            ['name' => 'J本庄', 'group_id' => '2'],
            ['name' => 'F7足利', 'group_id' => '2'],
            ['name' => 'F7秩父', 'group_id' => '2'],
            ['name' => 'F7狭山', 'group_id' => '2'],
            ['name' => 'KEI笠幡', 'group_id' => '2'],
            ['name' => 'KEI藤阿久', 'group_id' => '2'],
            ['name' => 'KEI籠原', 'group_id' => '2'],
            ['name' => 'M寄居', 'group_id' => '3'],
            ['name' => 'M本庄', 'group_id' => '3'],
            ['name' => 'M狭山', 'group_id' => '3'],
            ['name' => 'M太田', 'group_id' => '3'],
            ['name' => '笠幡SS', 'group_id' => '4'],
            ['name' => '深谷SS', 'group_id' => '4'],
            ['name' => '狭山SS', 'group_id' => '4'],
            ['name' => '熊谷HT', 'group_id' => '4'],
            ['name' => '花園SS', 'group_id' => '4'],
            ['name' => '熊谷原島 ', 'group_id' => '4'],
            ['name' => '台坂SS', 'group_id' => '4'],
            ['name' => '笹井SS', 'group_id' => '4'],
            ['name' => 'イセヤ', 'group_id' => '4'],
            ['name' => 'ホンダカーズ熊谷店', 'group_id' => '5'],
            ['name' => 'ホンダカーズ埼玉広瀬店', 'group_id' => '5'],
            ['name' => 'ホンダカーズ本庄南店', 'group_id' => '5'],
            ['name' => 'ホンダカーズ深谷東店', 'group_id' => '5'],
            ['name' => 'スズキアリーナ本庄早稲田店', 'group_id' => '5'],
            ['name' => 'スズキアリーナ太田南矢島店', 'group_id' => '5'],
            ['name' => 'スズキアリーナ深谷店', 'group_id' => '5'],
            ['name' => '埼玉ダイハツ花園インター店', 'group_id' => '5'],
            ['name' => '埼玉ダイハツ川越狭山店', 'group_id' => '5'],
        ]);
    }
}