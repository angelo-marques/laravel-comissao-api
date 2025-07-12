<?php

test('A aplicação retorna lista de dados', function()
{
    $this->postJson('/sales', [
        'valor_total' => 500,
        'tipo_venda' => 'afiliada'
    ]);

    $response = $this->getJson('/sales');

    $response->assertStatus(200)
                ->assertJsonStructure([
                    '*' => ['id', 'valor_total', 'tipo_venda', 'comissoes']
                ]);
});


test('O teste retorna erro 422 por dados invalidos', function()
{
    $response = $this->postJson('/sales', [
        'valor_total' => 'mil',
        'tipo_venda' => 'parceira'
    ]);

    $response->assertStatus(422);
});

