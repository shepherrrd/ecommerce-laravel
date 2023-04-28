<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'category' => $this->faker->text(),
            'item' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2,10,100),
            'description' => $this->faker->sentence(),
            'stock' => $this->faker->randomNumber(2)
        ];
    }
}
