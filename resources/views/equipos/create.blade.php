@extends('layouts.app')

@section('content')
<h2 class="mb-4">Nuevo Equipo</h2>

<form action="{{ route('equipos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <input type="text" name="categoria" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input type="text" name="marca" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select" required>
            <option value="Disponible">Disponible</option>
            <option value="Prestado">Prestado</option>
            <option value="Mantenimiento">Mantenimiento</option>
        </select>
    </div>
    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection