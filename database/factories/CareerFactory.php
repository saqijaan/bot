<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Career>
 */
class CareerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'career_name' => $this->faker->text(10),
            'skills' => $this->faker->text(500),
            'education' => $this->faker->text(200),
            'interests' => $this->faker->text(500),
        ];
    }
}
