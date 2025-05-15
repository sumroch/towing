<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\CarColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        CarColor::insert([
            ['name' => 'ホワイト系'],
            ['name' => 'ブラック系'],
            ['name' => 'パール系'],
            ['name' => 'ブルー系'],
            ['name' => 'レッド系'],
            ['name' => 'シルバー系'],
            ['name' => 'ゴールド系'],
            ['name' => 'パープル系'],
            ['name' => 'グリーン系'],
            ['name' => 'イエロー系'],
            ['name' => 'グレー系'],
            ['name' => 'オレンジ系'],
            ['name' => 'ピンク系'],
            ['name' => 'べジュー系'],
        ]);
    }
}