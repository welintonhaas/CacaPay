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
        // Se o usuário é administrador Permite cadastrar empresa
        if (Auth::user()->Admin()) {
            return view('cad_empresa');
        }else{
            return view('home', [ 'msg' => [false, 'msg'=>'Você não possui permissões suficientes']]);
        }
        
    }

    public function cadastrar(Request $req)
    {
        // Cria o objeto empresa
        $empresa = new Empresa;
        $empresa->razaoSocial = $req->razaoSocial;
        $empresa->cnpj = $req->cnpj;
        $empresa->telefone = $req->telefone;
        $empresa->email = $req->email;

        // Gera um tokem a partir do cnpj e a razao social
        $empresa->token = Hash::make($req->cnpj.$req->razaoSocial);

        // Salva a empresa e retorna para a view home com o status do cadastro
        if ($empresa->save()){
            $msg =  [true, 'msg'=>'Empresa Cadastrada com Sucesso!' ];
        }else{
            $msg = [false, 'msg'=>'Empresa não foi cadastrada'];
        }

        return view('home', ['msg'=>$msg]);

    }

}
