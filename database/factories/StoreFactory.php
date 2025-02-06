<?php

namespace Database\Factories;

use App\Domain\MasterData\Entities\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class StoreFactory extends Factory
{
    protected $model = Store::class;
    public function definition()
    {
        return [
            'name' => "store test",
        ];
    }
}
