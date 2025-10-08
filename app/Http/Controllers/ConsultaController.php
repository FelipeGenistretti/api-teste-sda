<?php

namespace App\Http\Controllers;

use App\Http\Requests\CpfValidatorRequest;
use App\Http\Requests\PlacaValidatorRequest;
use App\Http\Requests\ChassiValidatorRequest;
use App\Http\Requests\RenavamValidatorRequest;
use App\Http\Requests\CnpjValidatorRequest;
use Illuminate\Http\Request;
use App\JsonResponseTrait;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API de Consultas SDA",
 *     description="Documentação das consultas disponíveis na API SDA. Esta API retorna dados simulados a partir de arquivos JSON locais.",
 *     @OA\Contact(
 *         name="Equipe Tecnol",
 *         email="suporte@tecnol.com.br"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Servidor local de desenvolvimento"
 * )
 */


class ConsultaController extends Controller
{
     /**
     * @OA\Post(
     *     path="/api/consultas/condutores3",
     *     summary="Consulta informações de condutores (modelo 03##)",
     *     description="Recebe um CPF e retorna os dados de condutores correspondentes a partir de um arquivo JSON local.",
     *     tags={"Consultas - Condutores"},
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"cpf"},
     *             @OA\Property(
     *                 property="cpf",
     *                 type="string",
     *                 example="123.456.789-01",
     *                 description="CPF do condutor a ser consultado"
     *             )
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Consulta realizada com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="consulta realizada com sucesso"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 example={
     *                     "nome": "Teste Teste Teste",
     *                     "cpf": "123.456.789-01",
     *                     "categoria": "B",
     *                     "status": "Ativo"
     *                 }
     *             )
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno do servidor",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Erro inesperado")
     *         )
     *     )
     * )
     */

    use JsonResponseTrait;

    public function Condutores3(CpfValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Condutores/consulta-03.json",
        );
    }

    public function Infracoes5(PlacaValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Infracoes/infracoes-5.json",
        );
    }

    public function Infracoes19(CpfValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Infracoes/infracoes-19.json",
        );
    }

    public function dadosCadastraisCpf6(CpfValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/DadosCadastrais/dados-cadastrais-cpf-6.json",
        );
    }

    public function dadosCadastraisCpf7(CpfValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/DadosCadastrais/dados-cadastrais-cpf-7.json",
        );
    }

    public function dadosCadastraisCpf8(CpfValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/DadosCadastrais/dados-cadastrais-cpf-8.json",
        );
    }

    public function dadosCadastraisCnpj9(CnpjValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/DadosCadastrais/dados-cadastrais-cnpj-9.json",
        );
    }

    public function dadosCadastraisCnpj10(CnpjValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/DadosCadastrais/dados-cadastrais-cnpj-10.json",
        );
    }

    public function Veiculos01(PlacaValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-01.json",
        );
    }

    public function Veiculos02(PlacaValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-02.json",
        );
    }

    public function Veiculos04(PlacaValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-04.json",
        );
    }

    public function Veiculos12(PlacaValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-12.json",
        );
    }

    public function Veiculos13(PlacaValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-13.json",
        );
    }

    public function Veiculos14(PlacaValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-14.json",
        );
    }

    public function Veiculos16(ChassiValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-16.json",
        );
    }

    public function Veiculos17(RenavamValidatorRequest $request)
    {
        $request->validated();
        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-17.json",
        );
    }

    public function Veiculos18(Request $request)
    {
        $request->validate([
            'identificacao' => 'required|string|max:20|in:12345678901,12345678910123'
        ]);

        return $this->respondWithJson(
            "Consultas/Veiculos/veiculos-18.json",
        );
    }
}
