<?php

namespace App\Http\Controllers;

use App\Http\Requests\CpfValidatorRequest;
use App\Http\Requests\PlacaValidatorRequest;
use Illuminate\Http\Request;
use App\Helpers\JsonHelper;
use App\Http\Requests\CnpjValidatorRequest;
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
            return response()->json(['sucesso'=>'Placa consultada com sucesso!', 'data'=>$fileData], 200);

        }catch(Exception $e){
            return response()->json(['erro'=>'Erro ao consultar a placa:', $e->getMessage()], 500);
        }
    }

    public function Condutores3(CpfValidatorRequest $request)
    {
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Condutores/consulta-03.json");
            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
            return response()->json(['message'=>"consulta realizada com sucesso", "data"=>$fileData], 200);

        } catch(Exception $e){
            return response()->json(['message'=>'Erro inesperado', $e->getMessage()], 500);
        }
    }

    public function Infracoes5(PlacaValidatorRequest $request){
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Infracoes/infracoes-5.json");
            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
            return response()->json(['message'=>"consulta realizada com sucesso", "data"=>$fileData], 200);
        } catch(Exception $e) {
            return response()->json(['message'=>'Erro inesperado', $e->getMessage()], 500);
        }
    }

        public function Infracoes19(CpfValidatorRequest $request){
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Infracoes/infracoes-19.json");
            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
            return response()->json(['message'=>"consulta realizada com sucesso", "data"=>$fileData], 200);
        } catch(Exception $e) {
            return response()->json(['message'=>'Erro inesperado', $e->getMessage()], 500);
        }
    }

    public function dadosCadastraisCpf6(CpfValidatorRequest $request){
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/DadosCadastrais/dados-cadastrais-cpf-6.json");
            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
            return response()->json(['message'=>"consulta realizada com sucesso", "data"=>$fileData], 200);
        } catch(Exception $e) {
            return response()->json(['message'=>'Erro inesperado', $e->getMessage()], 500);
        }
    }

    public function dadosCadastraisCpf7(CpfValidatorRequest $request){
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/DadosCadastrais/dados-cadastrais-cpf-7.json");
            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
            return response()->json(['message'=>"consulta realizada com sucesso", "data"=>$fileData], 200);
        } catch(Exception $e) {
            return response()->json(['message'=>'Erro inesperado', $e->getMessage()], 500);
        }
    }

    public function dadosCadastraisCpf8(CpfValidatorRequest $request){
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/DadosCadastrais/dados-cadastrais-cpf-8.json");
            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
            return response()->json(['message'=>"consulta realizada com sucesso", "data"=>$fileData], 200);
        } catch(Exception $e) {
            return response()->json(['message'=>'Erro inesperado', $e->getMessage()], 500);
        }
    }

    public function dadosCadastraisCnpj9(CnpjValidatorRequest $request){
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/DadosCadastrais/dados-cadastrais-cnpj-9.json");
            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
            return response()->json(['message'=>"consulta realizada com sucesso", "data"=>$fileData], 200);
        } catch(Exception $e) {
            return response()->json(['message'=>'Erro inesperado', $e->getMessage()], 500);
        }
    }

    public function dadosCadastraisCnpj10(CnpjValidatorRequest $request){
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/DadosCadastrais/dados-cadastrais-cnpj-10.json");
            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
            return response()->json(['message'=>"consulta realizada com sucesso", "data"=>$fileData], 200);
        } catch(Exception $e) {
            return response()->json(['message'=>'Erro inesperado', $e->getMessage()], 500);
        }
    }


}
