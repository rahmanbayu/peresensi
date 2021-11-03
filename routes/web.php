<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MapelController;
use App\Models\Mapel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::resource('/mapel', MapelController::class);
    Route::put('/mapel/{mapel}/close', [MapelController::class, 'close'])->name('mapel.close');
    Route::get('mahasiswa/{id}/generate', [MahasiswaController::class, 'generateQr'])->name('mahasiswa.generate');
});


require __DIR__.'/auth.php';
