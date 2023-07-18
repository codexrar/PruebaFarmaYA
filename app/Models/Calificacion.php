<?php

namespace App\Models;
use App\Models\Asignatura;
use App\Models\Alumno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $fillable = ['alumno_id', 'asignatura_id','calificacion'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}
