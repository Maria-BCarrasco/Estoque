<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SaidaEstoqueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produto', [ProdutoController::class, 'index']);
Route::post('/produto', [ProdutoController::class, 'store']);
Route::put('/produto', [ProdutoController::class, 'update']);
Route::delete('/produto/{id}', [ProdutoController::class, 'delete']);
Route::get('/produto/{id}', [ProdutoController::class, 'show']);

Route::get('/cliente', [ClienteController::class, 'index']);
Route::post('/cliente', [ClienteController::class, 'store']);
Route::put('/cliente', [ClienteController::class, 'update']);
Route::delete('/cliente/{id}', [ClienteController::class, 'delete']);
Route::get('/cliente/{id}', [ClienteController::class, 'show']);

Route::get('/entrada', [EntradaController::class, 'index']);
Route::post('/entrada', [EntradaController::class, 'store']);
Route::delete('/entrada/{id}', [EntradaController::class, 'delete']);

Route::get('/saida_estoque', [SaidaEstoqueController::class, 'index']);
Route::post('/saida_estoque', [SaidaEstoqueController::class, 'store']);
Route::delete('/saida_estoque/{id}', [SaidaEstoqueController::class, 'delete']);