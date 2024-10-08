<?php

namespace Tests\Feature;

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemTest extends TestCase
{
    use RefreshDatabase;

    public function test_full_tarefa_crud()
    {
        //criar tarefa
        $tarefa = Tarefa::create([
            'titulo' => 'Nova Tarefa',
            'descricao' => 'Tarefa de Teste',
            'concluida' => false

        ]);
        $this->assertDatabaseHas('tarefas', [
            'titulo' => 'Nova Tarefa'
        ]);
        //assertDatabaseHas: Esse método veridica se há uma entrada específica no banco de dados.

        //Read
        $tarefaRecuperada = Tarefa::find($tarefa->id);
        $this->assertEquals('Nova Tarefa', $tarefaRecuperada->titulo); 
        $this->assertEquals('Tarefa de Teste', $tarefaRecuperada->descricao);  

        //Update
        $tarefaRecuperada->update(['titulo' => 'Tarefa Atualizada']);
        $this->assertEquals('Tarefa Atualizada', $tarefaRecuperada->titulo);

        //Delete
        $tarefaRecuperada->delete();
        $this->assertDatabaseMissing('tarefas', ['id' => $tarefaRecuperada->id]);

        //assertDatabaseMissing: este método verifica se não há mais um determinado registro no banco de dados
    }
}
