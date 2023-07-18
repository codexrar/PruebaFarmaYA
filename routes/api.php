<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AlumnoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alumnos',[ApiController::class,'alumnos']);
Route::get('/alumnos/{id_alumno}', [ApiController::class, 'alumno'])->name('nombre');
Route::post('/alumnos',[ApiController::class,'AlumnoCreate']);
Route::put('/alumnos/{id_alumno}', [ApiController::class, 'AlumnoEdit']);
Route::delete('/alumnos/{id_alumno}', [ApiController::class, 'AlumnoDeleted']);

Route::get('/asignaturas',[ApiController::class,'asignaturas']);
Route::get('/asignaturas/{id_asignatura}', [ApiController::class, 'asignatura'])->name('nombre');
Route::post('/asignaturas',[ApiController::class,'AsignaturaCreate']);
Route::put('/asignaturas/{id_asignatura}', [ApiController::class, 'AsignaturaEdit']);
Route::delete('/asignaturas/{id_asignatura}', [ApiController::class, 'AsignaturaDeleted']);

Route::get('/profesores',[ApiController::class,'profesores']);
Route::get('/profesores/{id_profesor}', [ApiController::class, 'profesor'])->name('nombre');
Route::post('/profesores',[ApiController::class,'ProfesorCreate']);
Route::put('/profesores/{id_profesor}', [ApiController::class, 'ProfesorEdit']);
Route::delete('/profesores/{id_profesor}', [ApiController::class, 'ProfesorDeleted']);

Route::get('/calificaciones',[ApiController::class,'calificaciones']);
Route::get('/calificaciones/{id_calificacion}', [ApiController::class, 'calificacion'])->name('nombre');
Route::post('/calificaciones',[ApiController::class,'CalificacionCreate']);
Route::put('/calificaciones/{id_calificacion}', [ApiController::class, 'CalificacionEdit']);
Route::delete('/calificaciones/{id_calificacion}', [ApiController::class, 'CalificacionDeleted']);