<?php

namespace App\Http\Controllers;

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

        $saida_estoques = SaidaEstoque::create([
            'id_cliente'=> $request->id_cliente,
            'id_produto'=> $request->id_produto,
            'quantidade'=> $request->quantidade
        ]);

        return response()->json($saida_estoques);
    }

    public function delete($id){

        $saida_estoques = SaidaEstoque::find($id);

        if($saida_estoques == null){
            return response()->json([
                'Produto disponível'
            ]);
        }

        $saida_estoques->delete($id);

        return response()->json('Produto vendido');
    }

}



