<?php

use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MingguController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('login');;
Route::post('/login', [AuthenticationController::class, 'loginAction']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthenticationController::class, 'dashboard']);
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    // crud kelas
    Route::get('/kelas', [KelasController::class, 'index']);
    Route::get('/kelas/create', [KelasController::class, 'create']);
    Route::post('/kelas/create', [KelasController::class, 'createAction']);
    Route::get('/kelas/delete/{id}', [KelasController::class, 'delete']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
    Route::post('/kelas/edit/{id}', [KelasController::class, 'editAction']);

    Route::get('/nilai', [NilaiController::class, 'index']);
    Route::get('/minggu', [MingguController::class, 'index']);
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'index']);
});
