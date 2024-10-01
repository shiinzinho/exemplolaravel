<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaIntegracaoTest extends TestCase
{
use RefreshDatabase;

public function test_criar_tarefa_por_meio_de_api(){
    $response = $this->postJson('/api/tarefas',[
        'titulo' => 'Nova Tarefa',
        'descricao' => 'Descrição de nova tarefa',
        'concluida' => false,
    ]);
    $response

    ->assertStatus(201)
    ->assertJson([
        'titulo' => 'Nova Tarefa',
        'descricao' => 'Descrição de nova tarefa',
        'concluida' => false,
    ]);
    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['titulo']);
}
}