<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesor
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $cedula
 * @property $asignatura_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Asignatura $asignatura
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Profesor extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'asignatura_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','cedula','asignatura_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function asignatura()
    {
        return $this->hasOne('App\Asignatura', 'id', 'asignatura_id');
    }
    

}
