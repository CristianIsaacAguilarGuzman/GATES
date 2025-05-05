<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ArchivoController;

Route::post('/archivos', [ArchivoController::class, 'store'])->name('archivos.store')->middleware('auth');
Route::delete('/archivos/{id}', [ArchivoController::class, 'destroy'])->name('archivos.destroy')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');

Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');

Route::post('/eventos/{id}/inscribirse', [EventoController::class, 'inscribirse'])
    ->name('eventos.inscribirse')
    ->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
