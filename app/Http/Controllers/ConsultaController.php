<?php

namespace App\Http\Controllers;

use App\Http\Requests\CpfValidatorRequest;
use App\Http\Requests\PlacaValidatorRequest;
use App\Http\Requests\ChassiValidatorRequest;
use App\Http\Requests\RenavamValidatorRequest;
use App\Http\Requests\CnpjValidatorRequest;
use Illuminate\Http\Request;
use App\JsonResponseTrait;

class ConsultaController extends Controller
{
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
