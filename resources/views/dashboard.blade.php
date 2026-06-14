@extends('layouts.app')

@section('content')
<h2 class="mb-4">Dashboard</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body text-center">
                <h5 class="card-title">Equipos Disponibles</h5>
                <h2>{{ $disponibles }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body text-center">
                <h5 class="card-title">Equipos Prestados</h5>
                <h2>{{ $prestados }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body text-center">
                <h5 class="card-title">Total Préstamos</h5>
                <h2>{{ $totalPrestamos }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection