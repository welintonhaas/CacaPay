<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
