<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Group::insert([
            ['name' => 'Group1'],
            ['name' => 'Group2'],
            ['name' => 'Group3'],
        ]);
    }
}
