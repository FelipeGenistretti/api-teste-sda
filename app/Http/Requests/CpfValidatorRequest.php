<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CpfValidatorRequest extends FormRequest
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
            "cpf"=>['required','string', 'size:11', 'in:28356005825']
        ];
    }

    public function messages():array
    {
        return [
            "cpf.in"=>["o CPF deve ser o 28356005825 para realizar a consulta"]
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
