<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\CarCategory;
use Illuminate\Database\Seeder;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        CarCategory::insert([
            ['name' => '新車'],
            ['name' => '展示車'],
            ['name' => '下取り'],
            ['name' => '中古車'],
            ['name' => '車検車'],
            ['name' => '修理車'],
            ['name' => 'レンタカー'],
            ['name' => '代車'],
            ['name' => 'リースアップ'],
        ]);
    }
}