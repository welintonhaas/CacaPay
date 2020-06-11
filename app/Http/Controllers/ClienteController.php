<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Cidade;
use App\User;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function cadastro()
    {
        // Obtem todas as Cidades
        $cidade = Cidade::all();

        // Obtem os Estados Agrupados
        $estado = Cidade::select('estado')->groupBy('estado')->get();

        // Retorna para a View de cadastro de Cliente com os dados necessários
        return view('cad_cliente', ['cidade'=>$cidade, 'estado'=>$estado]);
    }

    public function cadastrar(Request $req)
    {
        // Cria o Objeto Cliente e Salva no Banco
        $cliente = new Cliente;
        $cliente->nome = $req->input('name');
        $cliente->cpf = $req->input('cpf');;
        $cliente->telefone = $req->input('telefone');
        $cliente->idCidade = $req->input('cidade');
        $cliente->conta = rand(0,99999999);
        $cliente->save();

        // Cria o cadastra o usuário no banco com os dados informados em tela
        $user = new User;
        $user->password = Hash::make($req->password);
        $user->idCliente = $cliente->id;
        $user->email = $req->email;
        $user->name = $req->name;

        // Tenta Cadastrar o usuário e retorna para a view home com o status 
        if ($user->save()){
            $msg =  [true, 'msg'=>'Conta Criada com Sucesso! CONTA #'. str_pad($cliente->conta, 10, "0", STR_PAD_LEFT)];
        }else{
            $msg = [false, 'msg'=>'Cliente não foi cadastrado'];
        }

        return view('home', ['msg'=>$msg]);
        
    }
}
