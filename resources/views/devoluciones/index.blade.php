@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Devoluciones</h2>
    <a href="{{ route('devoluciones.create') }}" class="btn btn-primary">+ Nueva Devolución</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Equipo</th>
            <th>Solicitante</th>
            <th>Fecha Préstamo</th>
            <th>Fecha Esperada</th>
            <th>Fecha Real Devolución</th>
        </tr>
    </thead>
    <tbody>
        @foreach($devoluciones as $devolucion)
        <tr>
            <td>{{ $devolucion->prestamo->equipo->nombre }}</td>
            <td>{{ $devolucion->prestamo->solicitante->nombre }}</td>
            <td>{{ $devolucion->prestamo->fecha_prestamo }}</td>
            <td>{{ $devolucion->prestamo->fecha_esperada_devolucion }}</td>
            <td>{{ $devolucion->fecha_real_devolucion }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection