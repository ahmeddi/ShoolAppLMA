<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parent>
 */
class ParenttFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name() ,
            'nomfr' => $this->faker->name(),
            'telephone' => $this->faker->numerify('46######'),
            'whatsapp' => $this->faker->numerify('46######'),
            'telephone2' => $this->faker->numerify('46######'),
            'nni' => $this->faker->randomNumber(8),
            'sexe' => $this->faker->randomElement([1, 2]),
        ];
    }
}
