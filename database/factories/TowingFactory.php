<?php

namespace Database\Factories;

use App\Domain\MasterData\Entities\Towing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class TowingFactory extends Factory
{
    protected $model = Towing::class;
    public function definition()
    {
        return [
            'name' => "towing test",
        ];
    }
}
