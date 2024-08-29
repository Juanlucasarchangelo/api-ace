<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/painel', [App\Http\Controllers\PainelController::class, 'index'])->name('painel');
Route::get('/cadastrar-site', [App\Http\Controllers\SiteController::class, 'show'])->name('cadastrar-site');
Route::get('/cadastrar-cliente', [App\Http\Controllers\ClienteController::class, 'show'])->name('cadastrar-cliente');
