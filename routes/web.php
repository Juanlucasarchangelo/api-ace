<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/listar/cliente', [App\Http\Controllers\ClienteController::class, 'show'])->name('listar-cliente');
Route::get('/cadastrar/site', [App\Http\Controllers\SiteController::class, 'show'])->name('cadastrar-site');
Route::get('/cadastrar/cliente', [App\Http\Controllers\ClienteController::class, 'show'])->name('cadastrar-cliente');
Route::get('/painel', [App\Http\Controllers\PainelController::class, 'index'])->name('painel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
