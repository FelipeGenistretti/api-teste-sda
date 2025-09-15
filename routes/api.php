<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultaController;

Route::get('/consulta', [ConsultaController::class,'ConsultarPlaca']);

Route::post('/veiculos/1/precificacao-fipe/placa',[ConsultaController::class,'Veiculos01']);

Route::post('/veiculos/2/leilao/placa',[ConsultaController::class,'Veiculos02']);

Route::post('/veiculos/4/dados-completos/placa',[ConsultaController::class,'Veiculos04']);

Route::post('veiculos/12/precificacao-fipe/placa',[ConsultaController::class,'Veiculos12']);

Route::post('/veiculos/13/leilao/placa',[ConsultaController::class,'Veiculos13']);

Route::post('veiculos/14/debitos-e-multas/placa',[ConsultaController::class,'Veiculos14']);

Route::post('/veiculos/16/dados-completos/chassi',[ConsultaController::class,'Veiculos16']);

Route::post('veiculos/17/dados-completos/renavam',[ConsultaController::class,'Veiculos17']);

Route::post('/veiculos/18/dados-por-proprietario',[ConsultaController::class,'Veiculos18']);

Route::get('/teste', function () {
    return response()->json(['message' => 'API is working'], 200);
});