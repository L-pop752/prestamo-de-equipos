@extends('layouts.app')

@section('content')
<h2 class="mb-4">Nuevo Préstamo</h2>

<form action="{{ route('prestamos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Equipo</label>
        <select name="equipo_id" class="form-select" required>
            <option value="">-- Seleccione un equipo --</option>
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->nombre }} ({{ $equipo->codigo }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Solicitante</label>
        <select name="solicitante_id" class="form-select" required>
            <option value="">-- Seleccione un solicitante --</option>
            @foreach($solicitantes as $solicitante)
                <option value="{{ $solicitante->id }}">{{ $solicitante->nombre }} ({{ $solicitante->tipo }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Préstamo</label>
        <input type="date" name="fecha_prestamo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha Esperada de Devolución</label>
        <input type="date" name="fecha_esperada_devolucion" class="form-control" required>
    </div>
    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Registrar Préstamo</button>
</form>
@endsection