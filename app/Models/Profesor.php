<?php

namespace App\Models;
use App\Models\Asignatura;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'cedula','asignatura_id'];
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}

