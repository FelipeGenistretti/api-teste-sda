<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CnpjValidatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "cnpj"=>['required', "string","size:14", "in:12345678910123"]
        ];
    }

     public function messages():array
    {
        return [
            "cpf.in"=>["o CNPJ inválido para realizar a consulta"]
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator, response()->json([
            'message' => 'Erro de validação',
            'errors' => $validator->errors()
        ], 422));
    }
}
