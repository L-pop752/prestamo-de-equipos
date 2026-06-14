@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Préstamos</h2>
    <a href="{{ route('prestamos.create') }}" class="btn btn-primary">+ Nuevo Préstamo</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Equipo</th>
            <th>Solicitante</th>
            <th>Fecha Préstamo</th>
            <th>Fecha Esperada Devolución</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prestamos as $prestamo)
        <tr>
            <td>{{ $prestamo->equipo->nombre }}</td>
            <td>{{ $prestamo->solicitante->nombre }}</td>
            <td>{{ $prestamo->fecha_prestamo }}</td>
            <td>{{ $prestamo->fecha_esperada_devolucion }}</td>
            <td>
                @if($prestamo->devolucion)
                    <span class="badge bg-success">Devuelto</span>
                @else
                    <span class="badge bg-warning text-dark">Activo</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection