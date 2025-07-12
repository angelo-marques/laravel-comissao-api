<?php

namespace Tests\Feature\Sale\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\File;
use App\Domain\Sale\Entities\Sale;
use App\Infrastructure\Repositories\InMemorySaleRepository;

class InMemorySaleRepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        File::put(storage_path('../storage/app/public/sales.json'), json_encode([])); // Reset
    }

    public function test_salvar_e_listar_sale()
    {
        $repo = new InMemorySaleRepository();
        $sale = new Sale(123, 1000, 'direta', [
            'plataforma' => 100,
            'produtor' => 900,
            'afiliado' => 0
        ]);

        $repo->salvar($sale);
        $sales = $repo->listar();

        $this->assertCount(1, $sales);
        $this->assertEquals(1000, $sales[0]['valor_total']);
        $this->assertEquals('direta', $sales[0]['tipo_venda']);
    }

    public function test_remover_sale()
    {
        $repo = new InMemorySaleRepository();
        $sale1 = new Sale(1, 1000, 'direta', ['plataforma' => 100, 'produtor' => 900, 'afiliado' => 0]);
        $sale2 = new Sale(2, 2000, 'afiliada', ['plataforma' => 200, 'produtor' => 1200, 'afiliado' => 600]);

        $repo->salvar($sale1);
        $repo->salvar($sale2);

        $repo->remover(1);
        $sales = $repo->listar();

        $this->assertCount(1, $sales);
        $this->assertEquals(3, $sales[0]['id']);
    }
}

