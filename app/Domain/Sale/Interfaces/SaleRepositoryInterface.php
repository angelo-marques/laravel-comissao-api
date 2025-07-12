<?php

namespace App\Domain\Sale\Interfaces;

use App\Domain\Sale\Entities\Sale;

interface SaleRepositoryInterface {
    public function salvar(Sale $sale): void;
    public function listar(): array;
    public function remover(int $id): void;
}
