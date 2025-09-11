<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class ConsultaController extends Controller
{
    public function ConsultarPlaca(Request $request){

        try{
            
            $vericar = $request->validate([
                'placa'=>'required|string|max:7'
            ]);
            return response()->json(['sucesso'=>'Placa consultada com sucesso!'], 200);

        }catch(Exception $e){
            return response()->json(['erro'=>'Erro ao consultar a placa:', $e->getMessage()], 500);
        }


    }
}
