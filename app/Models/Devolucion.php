<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devoluciones';

    protected $fillable = ['prestamo_id', 'fecha_real_devolucion'];

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
}
