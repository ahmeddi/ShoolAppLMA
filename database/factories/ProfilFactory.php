<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil>
 */
class ProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     *     protected $fillable = [
     */
    public function definition(): array
    {
        return [
            'nom' => null,
            'nomfr' => null,
            'header' => null,
            'recet' => 500,
            'mois' => 2,
             
        ];
    }
}
