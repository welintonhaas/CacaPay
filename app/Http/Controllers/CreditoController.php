<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditoController extends Controller
{
    public function cadastro()
    {
        if (Auth::user()->Admin()) {
            return view('cad_credito');
        }else{
            return view('home', [ 'msg' => [false, 'msg'=>'Você não possui permissões suficientes']]);
        }
    }
}
