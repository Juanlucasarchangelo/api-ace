<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ResumoController;
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('listar')->group(function () {
    Route::get('/cliente', [ClienteController::class, 'index']);
    Route::get('/endereco', [EnderecoController::class, 'index']);
    Route::get('/site', [SiteController::class, 'index']);
    Route::get('/site-id', [SiteController::class, 'getSitesById']);
});

Route::prefix('cadastrar')->group(function () {
    Route::post('/cliente', [ClienteController::class, 'create']);
    Route::post('/endereco', [EnderecoController::class, 'create']);
    Route::post('/site', [SiteController::class, 'create']);
    Route::post('/resumo', [ResumoController::class, 'create']);
});

Route::prefix('editar')->group(function () {
    Route::post('/cliente', [ClienteController::class, 'create']);
    Route::post('/endereco', [EnderecoController::class, 'create']);
    Route::post('/site', [SiteController::class, 'update']);
    Route::post('/resumo', [ResumoController::class, 'create']);
});

Route::prefix('excluir')->group(function () {
    Route::post('/cliente', [ClienteController::class, 'destroy']);
    Route::post('/endereco', [EnderecoController::class, 'destroy']);
    Route::post('/site', [SiteController::class, 'destroy']);
    Route::post('/resumo', [ResumoController::class, 'destroy']);
});
