@extends('layouts.app')

@section('content')
<h2 class="mb-4">Editar Solicitante</h2>

<form action="{{ route('solicitantes.update', $solicitante) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $solicitante->nombre }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Documento</label>
        <input type="text" name="documento" class="form-control" value="{{ $solicitante->documento }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" value="{{ $solicitante->correo }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo</label>
        <select name="tipo" class="form-select" required>
            <option value="Estudiante" {{ $solicitante->tipo == 'Estudiante' ? 'selected' : '' }}>Estudiante</option>
            <option value="Docente" {{ $solicitante->tipo == 'Docente' ? 'selected' : '' }}>Docente</option>
        </select>
    </div>
    <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection