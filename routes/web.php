<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\RespuestaComentarioController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::apiResource('/publicacion', PublicacionController::class);
Route::apiResource('/comentario', ComentarioController::class);
Route::apiResource('/respuestaComentario', RespuestaComentarioController::class);