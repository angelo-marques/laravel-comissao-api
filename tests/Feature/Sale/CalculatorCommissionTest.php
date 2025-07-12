<?php
namespace Tests\Feature\Sale\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\Sale\Services\CalculatorCommission;

class CalculatorCommissionTest extends TestCase
{
    public function test_calcula_comissao_direta()
    {
        $valor = 1000;
        $comissoes = CalculatorCommission::calcular($valor, 'direta');

        $this->assertEquals(100, $comissoes['plataforma']);
        $this->assertEquals(900, $comissoes['produtor']);
        $this->assertEquals(0, $comissoes['afiliado']);
    }

    public function test_calcula_comissao_afiliada()
    {
        $valor = 2000;
        $comissoes = CalculatorCommission::calcular($valor, 'afiliada');

        $this->assertEquals(200, $comissoes['plataforma']);
        $this->assertEquals(1200, $comissoes['produtor']);
        $this->assertEquals(600, $comissoes['afiliado']);
    }

    public function test_tipo_invalido_lanca_excecao()
    {
        $this->expectException(\Exception::class);
        CalculatorCommission::calcular(1000, 'parceira');
    }
}
