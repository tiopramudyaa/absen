<?php

use App\Http\Controllers\api\AsdosController;
use App\Http\Controllers\api\KelasController;
use App\Http\Controllers\api\MahasiswaController;
use App\Http\Controllers\api\NilaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Asdos
Route::post('asdos/register', [AsdosController::class, 'create']);
Route::get('asdos/show', [AsdosController::class, 'show']);
Route::delete('asdos/delete/{id}', [AsdosController::class, 'delete']);

// Kelas
Route::get('kelas/show', [KelasController::class, 'show']);
Route::post('kelas/create', [KelasController::class, 'create']);
Route::delete('kelas/delete/{id}', [KelasController::class, 'delete']);

// Mahasiswa
Route::get('mahasiswa/show', [MahasiswaController::class, 'show']);
Route::post('mahasiswa/create', [MahasiswaController::class, 'create']);
Route::delete('mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);
Route::get('mahasiswa/showByKelas/{id_kelas}', [MahasiswaController::class, 'showByKelas']);
Route::put('mahasiswa/update/{id}', [MahasiswaController::class, 'update']);

// Penilaian
Route::get('nilai/show', [NilaiController::class, 'show']);
Route::post('nilai/create', [NilaiController::class, 'create']);
