<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Group::insert([
            ['name' => 'flat_7'],
            ['name' => 'keigayasui'],
            ['name' => 'joycal'],
        ]);
    }
}
