<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asignatura;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $asignaturaId = Asignatura::pluck('id')->random();
        return [
            'nombre' => $faker->firstName,
            'apellido' => $faker->lastName,
            'cedula' => $faker->numberBetween(1000000000, 9999999999),
            'asignatura_id' => $asignaturaId,
        ];
    }
}
