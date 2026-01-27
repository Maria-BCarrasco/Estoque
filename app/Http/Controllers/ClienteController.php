<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function store(Request $request){
        $verificacao = Cliente::where('cpf', '=', $request->cpf)->first();

        if($verificacao == null){
         $clientes = Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'idade' => $request->idade
        ]);
    
        return response()->json($clientes);

        } else {
            return response()->json('Este CPF já está sendo utilizado');
        }
    }


    public function index()
    {
        $clientes = Cliente::all();

        return response()->json($clientes);
    }


    public function update(Request $request)
    {

        $clientes = Cliente::find($request->id);


        if ($clientes == null) {
            return response()->json([
                'erro' => 'Clientes não encontrado'
            ]);
        }

        if (isset($request->nome)) {
            $clientes->nome = $request->nome;
        }

        if (isset($request->cpf)) {
            $clientes->cpf = $request->cpf;
        }

        if (isset($request->idade)) {
            $clientes->idade = $request->idade;
        }

        $clientes->update();

        return response()->json([
            'mensagem' => 'Atualizado'
        ]);
    }

    public function show($id)
    {

        $clientes = Cliente::find($id);


        if ($clientes == null) {
            return response()->json([
                'erro' => 'Cliente não encontrado'
            ]);
        }

        return response()->json($clientes);
    }

    public function delete($id)
    {

        $clientes = Cliente::find($id);

        if ($clientes == null) {
            return response()->json([
                'erro' => 'Cliente não encontrado'
            ]);
        }

        $clientes->delete();

        return response()->json([
            'mensagem' => 'Removido'
        ]);
    }
}
