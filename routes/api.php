<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultaController;

Route::get('/consulta', [ConsultaController::class,'ConsultarPlaca']);


Route::get('/teste', function () {
    return response()->json(['message' => 'API is working'], 200);
});