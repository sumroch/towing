<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::create([
            'username'  => 'manager',
            'password'  => bcrypt('12345'),
            'store_id'  => NULL
        ]);
        $admin->assignRole('manager');

        $admin = User::create([
            'username'  => 'hanazono',
            'password'  => bcrypt('12345'),
            'store_id'  => 1
        ]);
        $admin->assignRole('store');

        $admin = User::create([
            'username'  => 'asep',
            'password'  => bcrypt('12345'),
            'store_id'  => NULL
        ]);
        $admin->assignRole('driver');

        $admin = User::create([
            'username'  => 'dani',
            'password'  => bcrypt('12345'),
            'store_id'  => NULL
        ]);
        $admin->assignRole('driver');
    }
}
