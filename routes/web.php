<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

// Rota inicial padrão
Route::get('/', function(){
    return view('welcome');
});
// Rota criada via comando 'php artisan make:
Route::resource('livros', LivroController::class);
