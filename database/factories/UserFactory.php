<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
	protected $model = User::class;

    public function definition()
    {
        return [
            'number_id' => $this->faker->randomNumber(9, true),
			'name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
			'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt(123456), // password

        ];
    }
}
