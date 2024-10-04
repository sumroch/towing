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
            ['name' => 'manager', 'guard_name' => 'web'],
            ['name' => 'store', 'guard_name' => 'web'],
            ['name' => 'driver', 'guard_name' => 'web'],
        ]);
    }
}
