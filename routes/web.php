<?php

use App\Http\Controllers\{
	IndexController,LoginController,CadastroController
};

use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'login']);

Route::get('/cadastro', [CadastroController::class, 'cadastro']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile', function () {
    return view ('dashboard');
})->middleware('auth');

Route::resource(name:'tasks', controller: \App\Http\Controllers\TaskController::class)->middleware('auth');

Route::resource(name:'portugues', controller: \App\Http\Controllers\PortuguesController::class)->middleware('auth');

Route::resource(name:'artes', controller: \App\Http\Controllers\ArtesController::class)->middleware('auth');

Route::resource(name:'historia', controller: \App\Http\Controllers\HistoriaController::class)->middleware('auth');

Route::resource(name:'sociologia', controller: \App\Http\Controllers\SociologiaController::class)->middleware('auth');

Route::resource(name:'filosofia', controller: \App\Http\Controllers\FilosofiaController::class)->middleware('auth');
