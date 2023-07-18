<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'nombre' => $faker->firstName,
            'apellido' => $faker->lastName,
            'cedula' => $faker->numberBetween(1000000000, 9999999999),
            'nacimiento' => $faker->dateTimeThisDecade(),
            'edad' => $faker->numberBetween(18, 40),
        ];
    }
}
