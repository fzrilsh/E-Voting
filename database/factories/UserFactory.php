<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'nim' => $this->faker->unique()->numerify('##########'), // 10 digit unik
            'name' => $this->faker->name,
            'nickname' => $this->faker->unique()->userName,
            'password' => Hash::make('password'), // default password
            'gender' => $this->faker->randomElement(['M', 'F']),
            'birth_date' => $this->faker->date('Y-m-d', '2005-12-31'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($user) {
            $user->profile()->create([
                'role' => 'user',
            ]);
        });
    }
}
