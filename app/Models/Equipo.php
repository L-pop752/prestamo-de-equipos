<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['codigo', 'nombre', 'categoria', 'marca', 'estado'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
