<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Empresa;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{

    public function cadastro()
    {
        if (Auth::user()->Admin()) {
            return view('cad_empresa');
        }else{
            return view('home', [ 'msg' => [false, 'msg'=>'Você não possui permissões suficientes']]);
        }
    }

    public function cadastrar(Request $req)
    {
        $empresa = new Empresa;

        $empresa->razaoSocial = $req->razaoSocial;
        $empresa->cnpj = $req->cnpj;
        $empresa->telefone = $req->telefone;
        $empresa->email = $req->email;
        $empresa->token = Hash::make($req->cnpj.$req->cnpj);

        if ($empresa->save()){
            $msg =  [true, 'msg'=>'Empresa Cadastrada com Sucesso!' ];
        }else{
            $msg = [false, 'msg'=>'Empresa não foi cadastrado'];
        }

        return view('home', ['msg'=>$msg]);

    }

}
