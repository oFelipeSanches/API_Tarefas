<?php

 // http://127.0.0.1:8000/api/tarefas

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TarefasController; // ADICIONADO
use App\Models\Tarefa; // ADICIONADO

class TarefasController extends Controller
{

    public function index() // ROTA PRINCIPAL
    {
        return Tarefa::all();
    }

    public function store(Request $request)  // ENVIAR PARA O BD
    {
        $request->validate([
            'Titulo' => 'required',
            'Descricao' => 'required',
            'Status' => 'required',
        ]);

        return Tarefa::create($request->all());
    
    }

    public function show(string $id) // PESQUISAR PELO ID
    {
        return Tarefa::findOrfail($id);
    }

    public function update(Request $request, $id) // EDITA A TAREFA
    {
    $request->validate([
        'titulo' => 'required',
        'descricao' => 'required',
        'status' => 'required',
    ]);

        $tarefa = Tarefa::findOrfail($id);
        $tarefa->update($request->all());

        return response()->json(['☆' => 'Tarefa atualizada com sucesso'], 200);

    } 

    public function destroy(string $id) // DELETA A TAREFA
    {
        $tarefa = Tarefa::findOrfail($id);
        $tarefa->delete();
        
        return response()->json(['☆' => 'Tarefa deletada com sucesso'], 200);

    }
}
