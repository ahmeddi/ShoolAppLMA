<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Parentt;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parent = Parentt::inRandomOrder()->first();
        $class = Classe::inRandomOrder()->first();

        
        $lastStudent = $class->etuds->last();
        $nb = $lastStudent ? $lastStudent->nb + 1 : 1;

        return [
            'nom' => $this->faker->name(),
            'nomfr' => $this->faker->name(),
            'parent_id' => $parent->id,
            'ddn' => $this->faker->dateTimeBetween('-20 years', '-2 years'),
            'nni' => $this->faker->randomNumber(8),
            'nc' => $this->faker->randomNumber(8),
            'sexe' => $this->faker->randomElement([1, 2]),
            'classe_id' => $class->id,
            'nb' => $nb,
        ];
    }
}



