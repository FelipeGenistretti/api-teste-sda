<?php

namespace App;

use App\Helpers\JsonHelper;

trait JsonResponseTrait
{
    protected function respondWithJson(string $caminhoArquivo, string $successMessage = "Consulta realizada com sucesso")
    {
        $data = JsonHelper::decodeFile($caminhoArquivo);

        if (!$data) {
            return response()->json(['message' => "Erro ao carregar o arquivo json"], 500);
        }

        return response()->json([
            'message' => $successMessage,
            'data' => $data
        ], 200);
    }
}
