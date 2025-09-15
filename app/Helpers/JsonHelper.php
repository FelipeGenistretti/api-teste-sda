<?php

namespace App\Helpers;

class JsonHelper
{
    public static function decodeFile(string $caminhoArquivo): ?array
    {
        $path = base_path($caminhoArquivo);

        if (!file_exists($path)) {
            return null;
        }

        $content = file_get_contents($path);
        $data = json_decode($content, true);

        return json_last_error() === JSON_ERROR_NONE ? $data : null;
    }
}
