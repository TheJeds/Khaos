<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'precio'=> $this->faker->randomFloat(2, 20, 300),
            'cantidad'=> $this->faker->randomNumber(3, true),
            'tipo' => $this->faker->word(),
            'imagen' => 'product-1.jpg',
        ];
    }
}
