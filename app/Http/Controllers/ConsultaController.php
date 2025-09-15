<?php

namespace App\Http\Controllers;

use App\Http\Requests\CpfValidatorRequest;
use App\Http\Requests\PlacaValidatorRequest;
use Illuminate\Http\Request;
use App\Helpers\JsonHelper;
use App\Http\Requests\CnpjValidatorRequest;
use Exception;
use Illuminate\Auth\Events\Validated;

class ConsultaController extends Controller
{
    public function ConsultarPlaca(Request $request){

        try{
            $path = base_path("Consultas/GGI4005.json"); 
            $fileData = json_decode(file_get_contents($path), true);
            $vericar = $request->validate([
                'placa'=>'required|string|max:7|in:GJC3546,gjc3546'
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

    //PREFICIFICACAO FIPE POR PLACA VEICULOS 01
    public function Veiculos01(Request $request){ 
        try{
            $path = base_path('Consultas/Veiculos/GJC3546-CONSULTA01.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
            'placa'=>'required|string|max:7|in:GJC3546,gjc3546'
        ]);
          return response()->json(['sucesso'=>'Consulta 01 PRECIFICAÇÃO FIPE POR PLACA REALIZADA COM SUCESSO !!', 'data' => $fileData], 200);


        }catch(\Exception $e){
            return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }
    }

    //VEICULOS COM PASSAGEM EM LEILÃO POR PLACA 02
    public function Veiculos02(Request $request){
        try{
            $path = base_path('Consultas/Veiculos/PXK8702-CONSULTA02.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'placa'=>'required|string|max:7|in:GJC3546,PXK8702'
            ]);
            return response()->json(['sucesso'=>'Consulta 02 VEÍCULOS COM PASSAGEM EM LEILÃO POR PLACA REALIZADA COM SUCESSO !!', 'data' => $fileData], 200);
        }catch(\Exception $e){
            return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }
    }

    //DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR PLACA
    public function Veiculos04(Request $request){

        try{
            $path = base_path('Consultas/Veiculos/PXK8702-CONSULTA04.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'placa'=>'required|string|max:7|in:pxk8702,PXK8702'
            ]);

             return response()->json(['sucesso'=>'Consulta 04 DADOS COMPLETOS DO VEICULOS E RESTRIÇÃO POR PLACA REALIZADA COM SUCESSO !!', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }
      

    }

    //CONSULTA 12 PREÇO TABELA FIPE POR PLACA
    public function Veiculos12(Request $request){

         try{
            $path = base_path('Consultas/Veiculos/PXK8702-CONSULTA12.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'placa'=>'required|string|max:7|in:pxk8702,PXK8702'
            ]);

             return response()->json(['sucesso'=>'Consulta 12 PREÇO TABELA FIPE POR PLACA  REALIZADA COM SUCESSO !!', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }


    }

    //CONSULTA 13 VEICULOS COM PASSAGEM EM LEILÃO POR PLACA
    public function Veiculos13(Request $request){

           try{
            $path = base_path('Consultas/Veiculos/PXK8702-CONSULTA13.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'placa'=>'required|string|max:7|in:pxk8702,PXK8702'
            ]);

             return response()->json(['sucesso'=>'Consulta 13 VEICULO COM PASSAGEM EM LEILÃO POR PLACA REALIZADA COM SUCESSO!!', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }
        

    }

    //CONSULTA 14 DEBITOS E MULTAS POR PLACA 

    public function Veiculos14(Request $request){
          try{
            $path = base_path('Consultas/Veiculos/GJC3546-CONSULTA14.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'placa'=>'required|string|max:7|in:GJC3546,gjc3546'
            ]);

             return response()->json(['sucesso'=>'Consulta 14 DÉBITOS E MULTAS POR PLACA REALIZADA COM SUCESSO!!', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }

    }

    //CONSULTA 16 DADOS COMPLETOS DO VEÍCULO E RESTRIÇÕES POR CHASSI

    public function Veiculos16(Request $request){

          try{
            $path = base_path('Consultas/Veiculos/9BWAA05Z7D4112906-CONSULTA16.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'chassi'=>'required|string|max:20|in:9BWAA05Z7D4112906'
            ]);

             return response()->json(['sucesso'=>'Consulta 16 DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR CHASSI REALIZADA COM SUCESSO!!', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar o chassi:','mensagem'=> $e->getMessage()], 500);
        }



    }

    //CONSULTA 17 DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR RENAVAM

    public function Veiculos17(Request $request){

         try{
            $path = base_path('Consultas/Veiculos/01160742232-CONSULTA17.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'renavam'=>'required|string|max:20|in:01160742232'
            ]);

             return response()->json(['sucesso'=>'Consulta 17 DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR RENAVAM REALIZADA COM SUCESSO!!', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar o renavam:','mensagem'=> $e->getMessage()], 500);
        }



    }


    //CONSULTA 18 DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR CPF OU CNPJ
    public function Veiculos18(Request $request){

           try{
            $path = base_path('Consultas/Veiculos/28356005825-CONSULTA18.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'identificacao'=>'required|string|max:20|in:28356005825'
            ]);

             return response()->json(['sucesso'=>'Consulta 18 DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR CPF OU CNPJ REALIZADA COM SUCESSO!!', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar o CPF/CNPJ:','mensagem'=> $e->getMessage()], 500);
        }





    }


}
