@extends('layouts.app')

@section('content')
<h2 class="mb-4">Editar Equipo</h2>

<form action="{{ route('equipos.update', $equipo) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" value="{{ $equipo->codigo }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $equipo->nombre }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <input type="text" name="categoria" class="form-control" value="{{ $equipo->categoria }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input type="text" name="marca" class="form-control" value="{{ $equipo->marca }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select" required>
            <option value="Disponible" {{ $equipo->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="Prestado" {{ $equipo->estado == 'Prestado' ? 'selected' : '' }}>Prestado</option>
            <option value="Mantenimiento" {{ $equipo->estado == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
        </select>
    </div>
    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection