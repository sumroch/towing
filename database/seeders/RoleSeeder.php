<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::insert([
            ['name' => 'マネジャー', 'guard_name' => 'web'],
            ['name' => '店舗', 'guard_name' => 'web'],
            ['name' => '回送者', 'guard_name' => 'web'],
        ]);
    }
}
