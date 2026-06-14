<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\DevolucionController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('equipos', EquipoController::class);
Route::resource('solicitantes', SolicitanteController::class);
Route::resource('prestamos', PrestamoController::class);
Route::resource('devoluciones', DevolucionController::class)->only(['index', 'create', 'store']);
Route::patch('prestamos/{prestamo}/devolver', [PrestamoController::class, 'devolver'])->name('prestamos.devolver'); 