<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Asignatura;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('asignaturas')->insert([
            [
                'nombre' => 'Literatura',
                'descripcion' => 'Literatura',
            ],
            [
                'nombre' => 'Programacion',
                'descripcion' => 'Programacion',
            ],
            [
                'nombre' => 'Fisica',
                'descripcion' => 'Fisica',
            ],
            [
                'nombre' => 'Quimica',
                'descripcion' => 'Quimica',
            ],
            [
                'nombre' => 'Biologia',
                'descripcion' => 'Biologia',
            ],
            [
                'nombre' => 'Matematica',
                'descripcion' => 'Matematica',
            ],
        ]);
    }
}
