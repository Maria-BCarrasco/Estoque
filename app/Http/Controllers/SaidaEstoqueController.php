<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\SaidaEstoque;
use Illuminate\Http\Request;

class SaidaEstoqueController extends Controller
{
    //

    public function index(){

        $saida_estoques = SaidaEstoque::all();

        return response()->json($saida_estoques);
    }

    public function store(Request $request){
       
        $produto = Produto::find($request->id_produto);
        $cliente = Cliente::find($request->id_cliente);
        //dd($produto);

        if($produto->faixa_etaria_minima > $cliente->idade){
            return response()->json(['Idade mínima necessária não atingida']);
        } else {
            $saida_estoques = SaidaEstoque::create([
            'id_cliente'=> $request->id_cliente,
            'id_produto'=> $request->id_produto,
            'quantidade'=> $request->quantidade
        ]);

        $produto->quantidade_estoque = $produto->quantidade_estoque - $request->quantidade;

        $produto->update();
        return response()->json($saida_estoques);

        }
    }

    public function delete($id){

        $saida_estoques = SaidaEstoque::find($id);
        
        if($saida_estoques == null){
            return response()->json([
                'Produto não encontrado'
            ]);
        } else {

            $produto = Produto::find($saida_estoques->id_produto);
            $saida_estoques->delete($id);
            $produto->quantidade_estoque = $produto->quantidade_estoque + $saida_estoques->quantidade;
            $produto->update();
            return response()->json('Produto devolvido');
        }

       
    }

}



