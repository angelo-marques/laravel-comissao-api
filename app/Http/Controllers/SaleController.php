<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Sale\Entities\Sale;
use App\Domain\Sale\Services\CalculatorCommission;
use App\Infrastructure\Repositories\InMemorySaleRepository;

class SaleController extends Controller {
    private InMemorySaleRepository $repo;

    public function __construct() {
        $this->repo = new InMemorySaleRepository();
    }

    public function store(Request $request) {
  
        $data = $request->validate([
            'valor_total' => 'required|numeric|min:0',
            'tipo_venda' => 'required|in:direta,afiliada'
        ]);

        $comissoes = CalculatorCommission::calcular($data['valor_total'], $data['tipo_venda']);
        $sale = new Sale(1, $data['valor_total'], $data['tipo_venda'], $comissoes);
        $this->repo->salvar($sale);
        return response()->json([
            'valor_total' => $sale->valor_total,
            'tipo_venda' => $sale->tipo_venda,
            'comissoes' => $sale->comissoes,
        ]);
    }

    public function index() {
        return response()->json($this->repo->listar());
    }

    public function destroy(int $id) {
        $this->repo->remover($id);
        return response()->json(['removido' => $id]);
    }
}
