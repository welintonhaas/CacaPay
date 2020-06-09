<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cliente;
use App\Credito;

class CreditoController extends Controller
{
    public function cadastro()
    {
        if (Auth::user()->Admin()) {
           $clientes =  Cliente::all();

           $aClientes = array();

            foreach ($clientes as $cliente)
            {
                $aClientes[$cliente->id] = $cliente->nome;
            }

            return view('cad_credito', ['clientes' => $aClientes] );
        }else{
            return view('home', [ 'msg' => [false, 'msg'=>'Você não possui permissões suficientes']]);
        }
    }

    public function cadastrar(Request $req)
    {
        $credito = new Credito;

        $credito->valor = $req->valor;
        $credito->idCliente = $req->cliente;
        $credito->save();

        $cliente = Cliente::find($req->cliente);
        $cliente->saldo = $req->valor;

        if ($cliente->save()){
            $msg =  [true, 'msg'=>'Crédito Cadastrado com Sucesso para '.$cliente->nome ];
        }else{
            $msg = [false, 'msg'=>'Crédito não foi cadastrado'];
        }

        return view('home', ['msg'=>$msg]);

    }
}
