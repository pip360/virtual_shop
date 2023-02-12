<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement([1, 2, 3]),
			'name' => $this->faker->sentence(),
			'description' => $this->faker->paragraph(),
			'stock' => $this->faker->randomDigit(),
			'price' => $this->faker->randomDigit(),

        ];
    }
}
