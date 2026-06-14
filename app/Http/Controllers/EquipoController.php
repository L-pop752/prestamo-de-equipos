<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo'    => 'required|unique:equipos',
            'nombre'    => 'required',
            'categoria' => 'required',
            'marca'     => 'required',
            'estado'    => 'required',
        ]);

        Equipo::create($request->all());

        return redirect()->route('equipos.index')
                         ->with('success', 'Equipo creado correctamente.');
    }

    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'codigo'    => 'required|unique:equipos,codigo,' . $equipo->id,
            'nombre'    => 'required',
            'categoria' => 'required',
            'marca'     => 'required',
            'estado'    => 'required',
        ]);

        $equipo->update($request->all());

        return redirect()->route('equipos.index')
                         ->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return redirect()->route('equipos.index')
                         ->with('success', 'Equipo eliminado correctamente.');
    }
}
