<?php

namespace Database\Factories;

use App\Domain\MasterData\Entities\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;
    public function definition()
    {
        return [
            'name' => "group test",
        ];
    }
}