<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/listar-cliente', [ClienteController::class, 'index']);
Route::get('/listar-endereco', [EnderecoController::class, 'index']);
Route::get('/listar-site', [SiteController::class, 'index']);

Route::post('/cadastrar-cliente', [ClienteController::class, 'create']);
Route::post('/cadastrar-endereco', [EnderecoController::class, 'create']);
Route::post('/cadastrar-site', [SiteController::class, 'create']);