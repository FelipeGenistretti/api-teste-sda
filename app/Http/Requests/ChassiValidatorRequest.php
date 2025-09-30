<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChassiValidatorRequest extends FormRequest
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
            "chassi" => [
                "required",
                "string",
                "size:18",           // 
                "in:1XFAK23B9YZ0000000" // só aceita esses valores
            ]
        ];
    }

    /**
     * Mensagens customizadas de erro
     */
    public function messages(): array
    {
        return [
            "chassi.required" => "O campo chassi é obrigatório.",
            "chassi.size" => "O numero minimo de caracteres não foi atingido.",
            "chassi.in" => "O chassi deve ser 1XFAK23B9YZ0000000 para consulta ser realizada."
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
