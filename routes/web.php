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

