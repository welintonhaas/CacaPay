<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\StatusTransacao;

class StatusController extends Controller
{
    public function cadastro()
    {
        // Verifica se o usuário é Admin
        if (Auth::user()->Admin()) {
            return view('cad_status');
        }else{
            return view('home', [ 'msg' => [false, 'msg'=>'Você não possui permissões suficientes']]);
        }
        
    }

    public function cadastrar(Request $req)
    {
        // Cria o objeto Status Transação 
        $status = new StatusTransacao;
        $status->nome = $req->nome;

        // Salva o status e retorna para a view home com o status do cadastro
        if ($status->save()){
            $msg =  [true, 'msg'=>'Status '.$req->nome.' Cadastrado com Sucesso!' ];
        }else{
            $msg = [false, 'msg'=>'Status não foi cadastrado'];
        }

        return view('home', ['msg'=>$msg]);

    }
}
