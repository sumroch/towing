<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Driver::insert([
            ['name' => 'Idad', 'telephone' => '089622938113'],
            ['name' => 'Fathin', 'telephone' => '089622938112'],
            ['name' => 'Gagah', 'telephone' => '089622938114'],
            ['name' => 'Rofi', 'telephone' => '089622938115'],
            ['name' => 'Asep', 'telephone' => '089622938116'],
        ]);
    }
}
