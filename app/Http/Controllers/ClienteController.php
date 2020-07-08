<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Cidade;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $cliente->cpf = $req->input('cpf');
        $cliente->telefone = $req->input('telefone');
        $cliente->idCidade = $req->input('cidade');
        $cliente->conta = rand(0,99999999);
        $cliente->saldo = 2000.00;
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

    public function cadastrarAPI($dados)
    {
        // Cria o Objeto Cliente e Salva no Banco
        $cliente = new Cliente;
        $cliente->nome = isset($dados['nome']) ? $dados['nome']: 'Cadastro Automático';
        $cliente->cpf =  Str::length($dados['cpf']) == 11 ? $dados['cpf'] : abort(402);
        $cliente->conta = rand(0,99999999);
        $cliente->saldo = 50.00;

        // Cadastra o usuário, caso não consiga retorna erro de conteúdo informado incorret
        try {
            $cliente->save();
        }catch ( Exception $e){
            abort(406);
        }

        // Cria o cadastra o usuário no banco com os dados
        $user = new User;
        $user->password = isset($dados['senha']) ? Hash::make($dados['senha']) : Hash::make('123456') ;
        $user->idCliente = $cliente->id;
        $user->email = isset($dados['email']) ? $dados['email'] : $dados['cpf'].'@cacapay.com';
        $user->name = isset($dados['nome']) ? $dados['nome'] : 'Cadastro Automático';

        // Cadastra o usuário, caso não consiga retorna erro de conteúdo informado incorret
        try {
            $user->save();
        }catch ( Exception $e){
            abort(406);
        }

        // Retorna o cliente criado 
        return $cliente;
        
    }
}
