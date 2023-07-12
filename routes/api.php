<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tarefas', [TarefasController::class, 'index']); // ROTA PRINCIPAL 
Route::post('/tarefas', [TarefasController::class, 'store']); // ENVIAR PARA O BD 
Route::get('/tarefas/{id}', [TarefasController::class, 'show']); // PESQUISAR PELO ID
Route::put('/tarefas/{id}', [TarefasController::class, 'update']); // EDITAR TAREFA
Route::delete('/tarefas/{id}', [TarefasController::class, 'destroy']); // DELETAR TAREFA   