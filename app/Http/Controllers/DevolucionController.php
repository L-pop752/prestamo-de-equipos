<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class DevolucionController extends Controller
{
    public function index()
    {
        $devoluciones = Devolucion::with('prestamo.equipo', 'prestamo.solicitante')
                                  ->latest()->get();
        return view('devoluciones.index', compact('devoluciones'));
    }

    public function create()
    {
        $prestamos = Prestamo::whereDoesntHave('devolucion')
                             ->with('equipo', 'solicitante')
                             ->get();
        return view('devoluciones.create', compact('prestamos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prestamo_id'           => 'required|exists:prestamos,id',
            'fecha_real_devolucion' => 'required|date',
        ]);

        Devolucion::create($request->all());

        // Cambiar estado del equipo a Disponible
        $prestamo = Prestamo::find($request->prestamo_id);
        $prestamo->equipo->update(['estado' => 'Disponible']);

        return redirect()->route('devoluciones.index')
                         ->with('success', 'Devolución registrada correctamente.');
    }
}
