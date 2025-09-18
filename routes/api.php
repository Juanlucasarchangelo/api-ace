<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('listar')->group(function () {
    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::get('/sites', [SiteController::class, 'index']);
    Route::get('/site-id', [SiteController::class, 'getSitesById']);
});

Route::prefix('cadastrar')->group(function () {
    Route::post('/cliente', [ClienteController::class, 'create']);
    Route::post('/site', [SiteController::class, 'create']);
});

Route::prefix('editar')->group(function () {
    Route::post('/cliente', [ClienteController::class, 'create']);
    Route::post('/site', [SiteController::class, 'update']);
});

Route::prefix('excluir')->group(function () {
    Route::post('/cliente', [ClienteController::class, 'destroy']);
    Route::post('/site', [SiteController::class, 'destroy']);
});
