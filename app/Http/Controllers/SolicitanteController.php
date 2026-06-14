<?php

namespace App\Http\Controllers;

use App\Models\Solicitante;
use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function index()
    {
        $solicitantes = Solicitante::all();
        return view('solicitantes.index', compact('solicitantes'));
    }

    public function create()
    {
        return view('solicitantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required',
            'documento' => 'required|unique:solicitantes',
            'correo'    => 'required|email|unique:solicitantes',
            'tipo'      => 'required',
        ]);

        Solicitante::create($request->all());

        return redirect()->route('solicitantes.index')
                         ->with('success', 'Solicitante creado correctamente.');
    }

    public function edit(Solicitante $solicitante)
    {
        return view('solicitantes.edit', compact('solicitante'));
    }

    public function update(Request $request, Solicitante $solicitante)
    {
        $request->validate([
            'nombre'    => 'required',
            'documento' => 'required|unique:solicitantes,documento,' . $solicitante->id,
            'correo'    => 'required|email|unique:solicitantes,correo,' . $solicitante->id,
            'tipo'      => 'required',
        ]);

        $solicitante->update($request->all());

        return redirect()->route('solicitantes.index')
                         ->with('success', 'Solicitante actualizado correctamente.');
    }

    public function destroy(Solicitante $solicitante)
    {
        $solicitante->delete();

        return redirect()->route('solicitantes.index')
                         ->with('success', 'Solicitante eliminado correctamente.');
    }
}
