<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'  => 'manajer',
            'username'  => 'manajer',
            'email'     => 'manajer01@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938111',
            'store_id'  => NULL
        ]);
    }
}
