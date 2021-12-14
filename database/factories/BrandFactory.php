<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'logo' => $this->faker->imageUrl(200, 400),
            'status' => $this->faker->boolean(85),
            'creation_year' => $this->faker->year('now'),
        ];
    }
}
