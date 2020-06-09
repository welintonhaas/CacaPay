<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\StatusTransacao;

class StatusController extends Controller
{
    public function cadastro()
    {
        if (Auth::user()->Admin()) {
            return view('cad_status');
        }else{
            return view('home', [ 'msg' => [false, 'msg'=>'Você não possui permissões suficientes']]);
        }
    }

    public function cadastrar(Request $req)
    {
        $status = new StatusTransacao;

        $status->nome = $req->nome;

        if ($status->save()){
            $msg =  [true, 'msg'=>'Status '.$req->nome.' Cadastrado com Sucesso!' ];
        }else{
            $msg = [false, 'msg'=>'Status não foi cadastrado'];
        }

        return view('home', ['msg'=>$msg]);

    }
}
