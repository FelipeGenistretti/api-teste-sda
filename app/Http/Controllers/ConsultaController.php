<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class ConsultaController extends Controller
{
    public function ConsultarPlaca(Request $request){

        try{
            $path = base_path("Consultas/GGI4005.json"); 
            $fileData = json_decode(file_get_contents($path), true);
            $vericar = $request->validate([
                'placa'=>'required|string|max:7|in:GGI4005,ggi4005'
            ]);
            return response()->json(['sucesso'=>'Placa consultada com sucesso!', 'teste'=>$fileData], 200);

        }catch(Exception $e){
            return response()->json(['erro'=>'Erro ao consultar a placa:', $e->getMessage()], 500);
        }


    }
}
