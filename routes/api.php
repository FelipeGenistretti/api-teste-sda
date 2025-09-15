<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultaController;

Route::get('/consulta', [ConsultaController::class,'ConsultarPlaca']);

Route::prefix('veiculos')->group(function () {
    Route::post('/1/precificacao-fipe/placa', [ConsultaController::class, 'Veiculos01']);
    Route::post('/2/leilao/placa', [ConsultaController::class, 'Veiculos02']);
    Route::post('/4/dados-completos/placa', [ConsultaController::class, 'Veiculos04']);
    Route::post('/12/precificacao-fipe/placa', [ConsultaController::class, 'Veiculos12']);
    Route::post('/13/leilao/placa', [ConsultaController::class, 'Veiculos13']);
    Route::post('/14/debitos-e-multas/placa', [ConsultaController::class, 'Veiculos14']);
    Route::post('/16/dados-completos/chassi', [ConsultaController::class, 'Veiculos16']);
    Route::post('/17/dados-completos/renavam', [ConsultaController::class, 'Veiculos17']);
    Route::post('/18/dados-por-proprietario', [ConsultaController::class, 'Veiculos18']);
});


Route::get('/teste', function () {
    return response()->json(['message' => 'API is working'], 200);
});