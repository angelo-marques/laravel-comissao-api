<?php

namespace App\Domain\Sale\Services;

class CalculatorCommission {
    public static function calcular(float $valor, string $tipo): array {
        $plataforma = round($valor * 0.10, 2);

        return match ($tipo) {
            'direta' => [
                'plataforma' => $plataforma,
                'produtor' => round($valor * 0.90, 2),
                'afiliado' => 0
            ],
            'afiliada' => [
                'plataforma' => $plataforma,
                'produtor' => round($valor * 0.60, 2),
                'afiliado' => round($valor * 0.30, 2)
            ],
            default => throw new \Exception("Tipo de venda inválido")
        };
    }
}
