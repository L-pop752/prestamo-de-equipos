<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $fillable = ['nombre', 'documento', 'correo', 'tipo'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
