<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prof>
 */
class ProfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     *             $table->string('nom');
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'nomfr' => $this->faker->name(),
            'tel1' => $this->faker->numerify('46######'),
            'tel2' => $this->faker->numerify('46######'),
            'nni' => $this->faker->numerify('46######'),
            'diplom' => $this->faker->name(),
            'se' => $this->faker->randomNumber(8),
            'ts' => $this->faker->numberBetween(1,3),
            'ms' => $this->faker->randomNumber(8),
        ];
    }
}
