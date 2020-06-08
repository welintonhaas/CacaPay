<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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

}
