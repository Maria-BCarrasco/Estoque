<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Produto;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    //

    public function index()
    {

        $entradas = Entrada::all();

        return response()->json($entradas);
    }

    public function store(Request $request)
    {

        $produto = Produto::find($request->id_produto);

        if ($produto == null) {
            return response()->json('Produto não localizado');
        } else {
            $entradas = Entrada::create([
                'id_produto' => $request->id_produto,
                'quantidade' => $request->quantidade
            ]);

            if (isset($request->quantidade)) {
                $produto->quantidade_estoque = $produto->quantidade_estoque + $request->quantidade;
            }

            $produto->update();

            return response()->json('Estoque atualizado');
        }



        return response()->json($entradas);
    }

    public function delete($id)
    {

        $entradas = Entrada::find($id);

         $produto = Produto::find($entradas->id_produto);


        if (!$entradas) {
            return response()->json('Entrada não encontrada');
        } else {
        $entradas->delete();
        $produto->quantidade_estoque = $produto->quantidade_estoque - $entradas->quantidade;
        $produto->update();
        return response()->json('Entrada deletada com sucesso');
        }
    }
}
