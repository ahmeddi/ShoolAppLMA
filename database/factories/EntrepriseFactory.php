<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entreprise>
 */
class EntrepriseFactory extends Factory
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
            'telephone' => $this->faker->numerify('46######'),
            'whatsapp' => $this->faker->numerify('46######'),
            'telephone2' => $this->faker->numerify('46######'),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
