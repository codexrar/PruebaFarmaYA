<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Calificacion
 *
 * @property $id
 * @property $alumno_id
 * @property $asignatura_id
 * @property $calificacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Alumno $alumno
 * @property Asignatura $asignatura
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Calificacion extends Model
{
    
    static $rules = [
		'alumno_id' => 'required',
		'asignatura_id' => 'required',
		'calificacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['alumno_id','asignatura_id','calificacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumno()
    {
        return $this->hasOne('App\Alumno', 'id', 'alumno_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function asignatura()
    {
        return $this->hasOne('App\Asignatura', 'id', 'asignatura_id');
    }
    

}
