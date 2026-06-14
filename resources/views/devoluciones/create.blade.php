@extends('layouts.app')

@section('content')
<h2 class="mb-4">Nueva Devolución</h2>

<form action="{{ route('devoluciones.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Préstamo</label>
        <select name="prestamo_id" class="form-select" required>
            <option value="">-- Seleccione un préstamo activo --</option>
            @foreach($prestamos as $prestamo)
                <option value="{{ $prestamo->id }}">
                    {{ $prestamo->equipo->nombre }} — {{ $prestamo->solicitante->nombre }} 
                    ({{ $prestamo->fecha_prestamo }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha Real de Devolución</label>
        <input type="date" name="fecha_real_devolucion" class="form-control" required>
    </div>
    <a href="{{ route('devoluciones.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Registrar Devolución</button>
</form>
@endsection