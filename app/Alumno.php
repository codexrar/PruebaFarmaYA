<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $cedula
 * @property $nacimiento
 * @property $edad
 * @property $created_at
 * @property $updated_at
 *
 * @property Calificacion[] $calificacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'nacimiento' => 'required',
		'edad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','cedula','nacimiento','edad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calificacions()
    {
        return $this->hasMany('App\Calificacion', 'alumno_id', 'id');
    }
    

}
