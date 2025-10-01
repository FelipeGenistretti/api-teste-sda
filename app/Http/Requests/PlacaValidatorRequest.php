<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlacaValidatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Permite que o request seja processado
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "placa" => [
                "required",
                "string",
                "size:7",           
                "in:ABC1D23,abc1d23,ABC1234,abc1234" // só aceita esses valores, placas mercossul e antigas
            ]
        ];
    }

    /**
     * Mensagens customizadas de erro
     */
    public function messages(): array
    {
        return [
            "placa.required" => "O campo placa é obrigatório.",
            "placa.size" => "A placa deve ter exatamente 7 caracteres.",
            "placa.in" => "A placa deve ser ABC1234 ou ABC1D23 para a consulta ser realizada."
        ];
    }

    /**
     * Força o Laravel a retornar erro em JSON sempre que a validação falhar
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator, response()->json([
            'message' => 'Erro de validação',
            'errors' => $validator->errors()
        ], 422));
    }
}
