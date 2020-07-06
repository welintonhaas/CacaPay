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
        // Verifica se o usuário é Admin
        if (Auth::user()->Admin()) {

            // Obtem todos clientes e armazena na variável
            $clientes =  Cliente::all();

            // Cria um Array
            $arrayClientes = array();

            // Monta Clientes e respectivos ID em um array
            foreach ($clientes as $cliente){
                $arrayClientes[$cliente->id] = $cliente->nome;
            }

            // Retorna para a interface de cadastro de Crédito
            return view('cad_credito', ['clientes' => $arrayClientes]);

        }else{

            // Caso não tenha permissões, retorna para a home 
            return view('home', [ 'msg' => [false, 'msg'=>'Você não possui permissões suficientes']]);
            
        }
        
    }

    public function cadastrar(Request $req)
    {
        // Cria um novo objeto de Crédito para registrar a transação
        $credito = new Credito;
        $credito->valor = $req->valor;
        $credito->idCliente = $req->cliente;
        $credito->save();

        // Atualiza o Saldo do Cliente
        $cliente = Cliente::find($req->cliente);
        $cliente->saldo += $req->valor;

        // Salva o credito para o cliente e retorna para a home com o status da transação
        if ($cliente->save()){
            $msg =  [true, 'msg'=>'Crédito Cadastrado com Sucesso para '.$cliente->nome ];
        }else{
            $msg = [false, 'msg'=>'Crédito não foi cadastrado'];
        }

        return view('home', ['msg'=>$msg]);

    }
}
