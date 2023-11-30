<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emp>
 */
class EmpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'nomfr' => $this->faker->name(),
            'tel1' => $this->faker->numerify('2#######'),
            'post' => $this->faker->jobTitle(),
            'tel2' => $this->faker->numerify('3#######'),
            'nni' => $this->faker->randomNumber(8),
            'ms' => $this->faker->randomNumber(8),
        ];
    }
}
