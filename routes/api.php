<?php

use App\Http\Controllers\Api\ProccessQrController;
use App\Http\Controllers\Api\ProcessQrController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/qr-process/{mapel}', [ProcessQrController::class, 'process'])->name('qr.process');
Route::get('/qr-process/{mapel}/get-mahasiswa', [ProcessQrController::class, 'getMahasiswa'])->name('qr.get-mahasiswa');
