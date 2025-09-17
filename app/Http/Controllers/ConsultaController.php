<?php

namespace App\Http\Controllers;

use App\Http\Requests\CpfValidatorRequest;
use App\Http\Requests\PlacaValidatorRequest;
use App\Http\Requests\ChassiValidator;
use App\Http\Requests\RenavamValidatorRequest;
use Illuminate\Http\Request;
use App\Helpers\JsonHelper;
use App\Http\Requests\ChassiValidatorRequest;
use App\Http\Requests\CnpjValidatorRequest;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Eloquent\Casts\Json;

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

    
    public function Veiculos01(PlacaValidatorRequest $request){ 
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Veiculos/veiculos-01.json");                    
            if(!$fileData){
            return response()->json(['message'=>'Erro ao carregar o arquivo json'],500);
            }
          return response()->json(['sucesso'=>'Consulta 01 PRECIFICAÇÃO FIPE POR PLACA REALIZADA COM SUCESSO', 'data' => $fileData], 200);


        }catch(\Exception $e){
            return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }
    }

    
    public function Veiculos02(PlacaValidatorRequest $request){
        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Veiculos/veiculos-02.json");
            if(!$fileData){
                 return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }
         
           
            return response()->json(['sucesso'=>'Consulta 02 VEÍCULOS COM PASSAGEM EM LEILÃO POR PLACA REALIZADA COM SUCESSO', 'data' => $fileData], 200);
        }catch(\Exception $e){
            return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }
    }

    public function Veiculos04(PlacaValidatorRequest $request){

        try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Veiculos/veiculos-04.json");

            if(!$fileData){
                  return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }

             return response()->json(['sucesso'=>'Consulta 04 DADOS COMPLETOS DO VEICULOS E RESTRIÇÃO POR PLACA REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }
      

    }

  
    public function Veiculos12(PlacaValidatorRequest $request){

         try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Veiculos/veiculos-12.json");

            if(!$fileData){
                return response()->json(['message'=>"Erro ao carregar o arquivo json"], 500);
            }

             return response()->json(['sucesso'=>'Consulta 12 PREÇO TABELA FIPE POR PLACA  REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }


    }

    
    public function Veiculos13(PlacaValidatorRequest $request){

           try{
            $request->validated();
            $fileData= JsonHelper::decodeFile("Consultas/Veiculos/veiculos-13.json");

             return response()->json(['sucesso'=>'Consulta 13 VEICULO COM PASSAGEM EM LEILÃO POR PLACA REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }
        

    }

    

    public function Veiculos14(PlacaValidatorRequest $request){
          try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Veiculos/veiculos-14.json");

            if(!$fileData){      
             return response()->json(['sucesso'=>'Consulta 13 VEICULO COM PASSAGEM EM LEILÃO POR PLACA REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            }

             return response()->json(['sucesso'=>'Consulta 14 DÉBITOS E MULTAS POR PLACA REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar a placa:','mensagem'=> $e->getMessage()], 500);
        }

    }


    public function Veiculos16(ChassiValidatorRequest $request){

          try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Veiculos/veiculos-16.json");

            if(!$fileData){
                 return response()->json(['sucesso'=>'Consulta 13 VEICULO COM PASSAGEM EM LEILÃO POR PLACA REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            }

             return response()->json(['sucesso'=>'Consulta 16 DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR CHASSI REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar o chassi:','mensagem'=> $e->getMessage()], 500);
        }



    }


    public function Veiculos17(RenavamValidatorRequest $request){

         try{
            $request->validated();
            $fileData = JsonHelper::decodeFile("Consultas/Veiculos/veiculos-17.json");

            if(!$fileData){
                 return response()->json(['sucesso'=>'Consulta 13 VEICULO COM PASSAGEM EM LEILÃO POR PLACA REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            }

             return response()->json(['sucesso'=>'Consulta 17 DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR RENAVAM REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar o renavam:','mensagem'=> $e->getMessage()], 500);
        }



    }


    public function Veiculos18(Request $request){

           try{
            $path = base_path('Consultas/Veiculos/veiculos-18.json');
            $fileData = json_decode(file_get_contents($path),true);
            $verificar = $request->validate([
                'identificacao'=>'required|string|max:20|in:12345678901,12345678910123'
            ]);

             return response()->json(['sucesso'=>'Consulta 18 DADOS COMPLETOS DO VEICULO E RESTRIÇÕES POR CPF OU CNPJ REALIZADA COM SUCESSO', 'data' => $fileData], 200);
            

        }catch(\Exception $e){
             return response()->json(['erro'=>'Erro ao consultar o CPF/CNPJ:','mensagem'=> $e->getMessage()], 500);
        }





    }


}
