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
            'name'      => 'manager',
            'username'  => 'manager',
            'email'     => 'manager01@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938111',
            'store_id'  => NULL
        ]);
        $admin->assignRole('manager');

        $admin = User::create([
            'name'      => 'hanazono',
            'username'  => 'hanazono',
            'email'     => 'hanazono01@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938112',
            'store_id'  => 1
        ]);
        $admin->assignRole('store');

        $admin = User::create([
            'name'      => 'asep',
            'username'  => 'asep',
            'email'     => 'asep@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938123',
            'store_id'  => NULL
        ]);
        $admin->assignRole('driver');

        $admin = User::create([
            'name'      => 'dani',
            'username'  => 'dani',
            'email'     => 'dani@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938124',
            'store_id'  => NULL
        ]);
        $admin->assignRole('driver');
    }
}
