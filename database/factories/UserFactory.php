<?php

namespace Database\Factories;

use App\Domain\MasterData\Entities\Store;
use App\Domain\MasterData\Entities\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    public function definition()
    {
        return [
            'username' => fake()->name(),
            'store_id' => Store::factory(),
            'password' => bcrypt('12345'), // password()
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => null,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('マネジャー');
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
