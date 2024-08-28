<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/painel', [App\Http\Controllers\PainelController::class, 'index'])->name('painel');
Route::get('/cadastrar-site', [App\Http\Controllers\CadastrarSite::class, 'index'])->name('cadastrar-site');
