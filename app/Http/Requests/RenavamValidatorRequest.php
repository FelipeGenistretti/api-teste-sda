<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenavamValidatorRequest extends FormRequest
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
            "renavam" => [
                "required",
                "string",
                "size:11",           
                "in:12345678901" // só aceita esses valores
            ]
        ];
    }

    /**
     * Mensagens customizadas de erro
     */
    public function messages(): array
    {
        return [
            "renavam.required" => "O campo renavam é obrigatório.",
            "renavam.size" => "A renavam deve ter exatamente 11 caracteres.",
            "renavam.in" => "A renavam deve ser 12345678901 para a consulta ser realizada."
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
