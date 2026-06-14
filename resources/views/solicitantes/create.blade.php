@extends('layouts.app')

@section('content')
<h2 class="mb-4">Nuevo Solicitante</h2>

<form action="{{ route('solicitantes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Documento</label>
        <input type="text" name="documento" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo</label>
        <select name="tipo" class="form-select" required>
            <option value="Estudiante">Estudiante</option>
            <option value="Docente">Docente</option>
        </select>
    </div>
    <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection