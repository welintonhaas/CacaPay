<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastro(){
        return view('cad_cliente');
    }
}
