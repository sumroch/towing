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
        $admin->assignRole('マネジャー');

        $admin = User::create([
            'username'  => 'hanazono',
            'password'  => bcrypt('12345'),
            'store_id'  => 1
        ]);
        $admin->assignRole('店舗');

        $admin = User::create([
            'username'  => '中村',
            'password'  => bcrypt('12345'),
            'store_id'  => NULL
        ]);
        $admin->assignRole('回送者');

        $admin = User::create([
            'username'  => '森',
            'password'  => bcrypt('12345'),
            'store_id'  => NULL
        ]);
        $admin->assignRole('回送者');

        $admin = User::create([
            'username'  => '小野沢',
            'password'  => bcrypt('12345'),
            'store_id'  => NULL
        ]);
        $admin->assignRole('回送者');

        $admin = User::create([
            'username'  => '佐藤',
            'password'  => bcrypt('12345'),
            'store_id'  => NULL
        ]);
        $admin->assignRole('回送者');
    }
}
