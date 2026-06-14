<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Equipo;
use App\Models\Solicitante;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('equipo', 'solicitante')->latest()->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $equipos = Equipo::where('estado', 'Disponible')->get();
        $solicitantes = Solicitante::all();
        return view('prestamos.create', compact('equipos', 'solicitantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_id'                => 'required|exists:equipos,id',
            'solicitante_id'           => 'required|exists:solicitantes,id',
            'fecha_prestamo'           => 'required|date',
            'fecha_esperada_devolucion'=> 'required|date|after:fecha_prestamo',
        ]);

        Prestamo::create($request->all());

        // Cambiar estado del equipo a Prestado
        Equipo::find($request->equipo_id)->update(['estado' => 'Prestado']);

        return redirect()->route('prestamos.index')
                         ->with('success', 'Préstamo registrado correctamente.');
    }
}
