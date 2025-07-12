<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Sale\Entities\Sale;
use App\Domain\Sale\Interfaces\SaleRepositoryInterface;

class InMemorySaleRepository implements SaleRepositoryInterface {
    private string $file = '../storage/app/public/sales.json'; //para teste tem que trocar 'storage/app/public/sales.json'.

    public function salvar(Sale $sale): void {
        $sales = $this->listar();
        $ultimoId = 0;
        if($sales !== null && !empty($sales)){
            $ultimoItem = end($sales)['id'];
            $ultimoId = $ultimoItem;
        }
       
        $sales[] = [
            'id' => $sale->id + $ultimoId,
            'valor_total' => $sale->valor_total,
            'tipo_venda' => $sale->tipo_venda,
            'comissoes' => $sale->comissoes
        ];
       $dados = json_encode($sales);
       file_put_contents($this->file, $dados);
    }

    public function listar(): array {
        if (!file_exists($this->file)){ return []; }
        return json_decode(file_get_contents($this->file), true) ?? [];
    }

    public function remover(int $id): void {
        $sales = array_filter($this->listar(), fn($s) => $s['id'] !== $id);
        file_put_contents($this->file, json_encode(array_values($sales)));
    }
}

