<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Calificacion;
use App\Models\Profesor;

class ApiController extends Controller
{
    public function alumnos(Request $request){

        $alumnos = Alumno::all();
        return response()->json($alumnos);
    }

    public function alumno($alumno_id){

        try {
            $alumno = Alumno::findOrFail($alumno_id);
            return response()->json($alumno);
        } 
        
        catch (\Exception $e) {
            return response()->json(['mensaje' => 'Alumno no encontrado'], 404);
        }
    }

    public function AlumnoCreate(Request $request){
        
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'edad' => 'required|integer',
            'nacimiento' => 'required|date',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['mensaje' => 'Error de validación', 'errores' => $validator->errors()], 400);
        }

        $alumno = new Alumno();
        $alumno->nombre = $request->input('nombre');
        $alumno->apellido = $request->input('apellido');
        $alumno->cedula = $request->input('cedula');
        $alumno->nacimiento= $request->input('nacimiento');
        $alumno->edad = $request->input('edad');

        $alumno->save();

        return response()->json(['mensaje' => 'Alumno creado exitosamente'], 201);
    }

    public function AlumnoEdit(Request $request, $alumno_id){
    
        $alumno = Alumno::find($alumno_id);

        if (!$alumno) {
            return response()->json(['mensaje' => 'Alumno no encontrado'], 404);
        }
        $alumno->fill($request->all());
        $alumno->save();
        return response()->json(['mensaje' => 'Alumno modificado exitosamente'], 200);
    }

    public function AlumnoDeleted($alumno_id){
        
        try {

            $alumno = Alumno::findOrFail($alumno_id);
            $alumno->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['mensaje' => 'No se puede eliminar el alumno. Está siendo referenciado por otro campo'], 400);
        }
   
        return response()->json(['mensaje' => 'Alumno eliminado exitosamente'], 200);
    }


    public function asignaturas(Request $request){

        $asignaturas = Asignatura::all();
        return response()->json($asignaturas);
    }

    public function asignatura($asignatura_id){

        try {
            $asignatura = Asignatura::findOrFail($asignatura_id);
            return response()->json($asignatura);
        }
        catch (\Exception $e) {
            return response()->json(['mensaje' => 'Asignatura no encontrada'], 404);
        }
    }

    public function AsignaturaCreate(Request $request){
        
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',    
        ]);
    
        if ($validator->fails()) {
            return response()->json(['mensaje' => 'Error de validación', 'errores' => $validator->errors()], 400);
        }

        $asignatura = new Asignatura();
        $asignatura->nombre = $request->input('nombre');
        $asignatura->descripcion = $request->input('descripcion');

        $asignatura->save();

        return response()->json(['mensaje' => 'Asignatura creada exitosamente'], 201);
    }

    public function AsignaturaEdit(Request $request, $asignatura_id){
    
        $asignatura = Asignatura::find($asignatura_id);

        if (!$asignatura) {
            return response()->json(['mensaje' => 'Asignatura no encontrado'], 404);
        }
        $asignatura->fill($request->all());
        $asignatura->save();
        return response()->json(['mensaje' => 'Asignatura modificado exitosamente'], 200);
    }

    public function AsignaturaDeleted($asignatura_id){
        
        try {

            $asignatura = Asignatura::findOrFail($asignatura_id);
            $asignatura->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['mensaje' => 'No se puede eliminar la asignatura. Está siendo referenciado por otro campo'], 400);
        }
   
        return response()->json(['mensaje' => 'Asignatura eliminada exitosamente'], 200);
    }

    public function profesores(Request $request){

        $profesores = Profesor::with('asignatura')->get();
        return response()->json($profesores);
    }

    public function profesor($profesor_id){

        try {
            $profesor = Profesor::findOrFail($profesor_id);
            return response()->json($profesor);
        }
        catch (\Exception $e) {
            return response()->json(['mensaje' => 'Profesor no encontrado'], 404);
        }
    }

    public function ProfesorCreate(Request $request){
        
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'cedula' => 'required|string',
            'asignatura_id' => 'required|integer',   
        ]);
    
        if ($validator->fails()) {
            return response()->json(['mensaje' => 'Error de validación', 'errores' => $validator->errors()], 400);
        }

        $profesor = new Profesor();
        $profesor->nombre = $request->input('nombre');
        $profesor->apellido = $request->input('apellido');
        $profesor->cedula = $request->input('cedula');
        $profesor->asignatura_id = $request->input('asignatura_id');

        $profesor->save();

        return response()->json(['mensaje' => 'Profesor creado exitosamente'], 201);
    }

    public function ProfesorEdit(Request $request, $profesor_id){
    
        $profesor = Profesor::find($profesor_id);

        if (!$profesor) {
            return response()->json(['mensaje' => 'Profesor no encontrado'], 404);
        }
        $profesor->fill($request->all());
        $profesor->save();
        return response()->json(['mensaje' => 'Profesor modificado exitosamente'], 200);
    }

    public function ProfesorDeleted($profesor_id){
        
        try {

            $profesor = Profesor::findOrFail($profesor_id);
            $profesor->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['mensaje' => 'No se puede eliminar el Profesor. Está siendo referenciado por otro campo'], 400);
        }
   
        return response()->json(['mensaje' => 'Profesor eliminado exitosamente'], 200);
    }

    public function calificaciones(Request $request){

        $calificaciones = Calificacion::with('asignatura', 'alumno')->get();
        return response()->json($calificaciones);
    }

    public function calificacion($calificacion_id){

        try {
            $calificacion = Calificacion::findOrFail($calificacion_id);
            return response()->json($calificacion);
        }
        catch (\Exception $e) {
            return response()->json(['mensaje' => 'Calificacion no encontrada'], 404);
        }
    }

    public function CalificacionCreate(Request $request){
        
        $validator = Validator::make($request->all(), [
            'asignatura_id' => 'required|integer',
            'alumno_id' => 'required|integer',
            'calificacion' => 'required|integer', 
        ]);
    
        if ($validator->fails()) {
            return response()->json(['mensaje' => 'Error de validación', 'errores' => $validator->errors()], 400);
        }

        $calificacion = new Calificacion();
        $calificacion->asignatura_id = $request->input('asignatura_id');
        $calificacion->alumno_id = $request->input('alumno_id');
        $calificacion->calificacion = $request->input('calificacion');

        $calificacion->save();

        return response()->json(['mensaje' => 'Calificacion creada exitosamente'], 201);
    }

    public function CalificacionEdit(Request $request, $calificacion_id){
    
        $calificacion = Calificacion::find($calificacion_id);

        if (!$calificacion) {
            return response()->json(['mensaje' => 'Calificacion no encontrada'], 404);
        }
        $calificacion->fill($request->all());
        $calificacion->save();
        return response()->json(['mensaje' => 'Calificacion modificada exitosamente'], 200);
    }

    public function CalificacionDeleted($calificacion_id){
        
        try {

            $calificacion = Calificacion::findOrFail($calificacion_id);
            $calificacion->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['mensaje' => 'No se puede eliminar la calificacion. Está siendo referenciado por otro campo'], 400);
        }
        return response()->json(['mensaje' => 'Calificacion eliminada exitosamente'], 200);
    }
}
