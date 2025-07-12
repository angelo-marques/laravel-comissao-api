<?php

namespace App\Domain\Sale\Entities;

class Sale {
    public function __construct(
        public readonly int $id,
        public readonly float $valor_total,
        public readonly string $tipo_venda,
        public readonly array $comissoes
    ) {}
}
