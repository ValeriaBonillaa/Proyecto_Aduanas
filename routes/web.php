<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RegistrarClientesController;
use App\Http\Controllers\InicioSesionController;
use App\Http\Controllers\RestablecerContrasenaController;
use App\Http\Controllers\RegistrarUsuarioController;
use App\Http\Controllers\SolicitudProcesoController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\CambiarContrasenaController;


Route::get('/login', [InicioSesionController::class, '_invoke'])->name('login');
Route::post('/login', [InicioSesionController::class, 'store'])->name('login.store');

Route::get('/Usuario', [RegistrarUsuarioController::class, 'create'])->name('registrar-usuario');
Route::post('/Usuario', [RegistrarUsuarioController::class, 'store'])->name('registrar-usuario.store');

Route::get('/Contraseña', [RestablecerContrasenaController::class, '_invoke'])->name('restablecer-contrasena');
Route::post('/Contraseña', [RestablecerContrasenaController::class, 'link'])->name('restablecer-contrasena.link');

Route::get('password/reset/{token}', [CambiarContrasenaController::class, '_invoke'])->name('password.reset');
Route::post('/password/update', [CambiarContrasenaController::class, 'actualizar'])->name('password.update');


Route::middleware('auth')->group(function () {
    Route::get('/Inicio', [InicioController::class, '_invoke'])->name('inicio');

    Route::get('/Registrar', [RegistrarClientesController::class, 'create'])->name('registrar');
    Route::post('/Registrar', [RegistrarClientesController::class, 'store'])->name('registrar.store');

    Route::get('/Solicitud1', [SolicitudProcesoController::class, '_invoke1'])->name('solicitud1');
    Route::post('/Solicitud1', [SolicitudProcesoController::class, 'guardar1'])->name('solicitud1.guardar');

    Route::get('/Solicitud2', [SolicitudProcesoController::class, '_invoke2'])->name('solicitud2');
    Route::post('/Solicitud2', [SolicitudProcesoController::class, 'guardar2'])->name('solicitud2.guardar');

    Route::get('/Solicitud3', [SolicitudProcesoController::class, '_invoke3'])->name('solicitud3');
    Route::post('/Solicitud3', [SolicitudProcesoController::class, 'guardar3'])->name('solicitud3.guardar');

    Route::get('/Cuenta', [CuentaController::class, '_invoke'])->name('cuenta');
    Route::post('/Cuenta', [CuentaController::class, 'logout'])->name('cerrar-sesion');
});
