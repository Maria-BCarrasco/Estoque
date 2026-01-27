<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    //

    public function index(){

        $entradas = Entrada::all();

        return response()->json($entradas);
    }

    public function store(Request $request){

        $entradas = Entrada::create([
            'id_produto'=> $request-> id_produto,
            'quantidade'=> $request-> quantidade
        ]);

        return response()->json($entradas);

    }

    public function delete($id){

        $entradas = Entrada::find($id);

        if($entradas == null){
            return response()->json('Produto não disponível');
        } 

        $entradas->delete();

        return response()->json('Produto removido');
    }


}
