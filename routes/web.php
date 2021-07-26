<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapturaController;
use App\Http\Controllers\ListaController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/captura', [CapturaController::class, 'index'])->name('captura');

Route::get('/lista', [ListaController::class, 'all'])->name('lista');

Route::delete('/captura/{id}', [CapturaController::class, 'delete'])->name('Fixa');

require __DIR__.'/auth.php';



