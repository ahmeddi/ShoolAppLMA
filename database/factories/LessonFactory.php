<?php

namespace Database\Factories;

use App\Models\Mat;
use App\Models\Prof;
use App\Models\Classe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     *             $table->foreignId('prof_id')->constrained()->onDelete('cascade');
     */
    public function definition(): array
    {
        return [
            'prof_id' => Prof::inRandomOrder()->first()->id,
            'mat_id' => Mat::inRandomOrder()->first()->id,
            'class_id' => Classe::inRandomOrder()->first()->id,
            'time' => $this->faker->numberBetween(1, 3),
            'day' => $this->faker->numberBetween(1, 7),
    
        ];
    }
}
