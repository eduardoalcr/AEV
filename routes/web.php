<?php

use App\Http\Controllers\{
	IndexController,LoginController,CadastroController
};

use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'login']);

Route::get('/cadastro', [CadastroController::class, 'cadastro']);

Route::get('/index', [IndexController::class, 'index']);





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource(name:'tasks', controller: \App\Http\Controllers\TaskController::class);

Route::resource(name:'portugues', controller: \App\Http\Controllers\PortuguesController::class);

Route::resource(name:'artes', controller: \App\Http\Controllers\ArtesController::class);

Route::resource(name:'historia', controller: \App\Http\Controllers\HistoriaController::class);

Route::resource(name:'sociologia', controller: \App\Http\Controllers\SociologiaController::class);

Route::resource(name:'filosofia', controller: \App\Http\Controllers\FilosofiaController::class);

