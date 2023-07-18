<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asignatura;
use App\Models\Alumno;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calificacion>
 */
class CalificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $alumnoId = Alumno::pluck('id')->random();
        $asignaturaId = Asignatura::pluck('id')->random();

        return [
            'alumno_id' => $alumnoId,
            'asignatura_id' => $asignaturaId,
            'calificacion' => $faker->numberBetween(1, 20),
        ];
    }
}
