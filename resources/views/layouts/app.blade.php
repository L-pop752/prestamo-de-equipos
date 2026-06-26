<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Préstamo de Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">🖥️ Préstamo de Equipos</a>
        <div>
            <a href="/" class="btn btn-outline-light btn-sm me-2">Inicio</a>
            <a href="/equipos" class="btn btn-outline-light btn-sm me-2">Equipos</a>
            <a href="/solicitantes" class="btn btn-outline-light btn-sm me-2">Solicitantes</a>
            <a href="/prestamos" class="btn btn-outline-light btn-sm me-2">Préstamos</a>
            <a href="/devoluciones" class="btn btn-outline-light btn-sm">Devoluciones</a>
        </div>
    </div>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
