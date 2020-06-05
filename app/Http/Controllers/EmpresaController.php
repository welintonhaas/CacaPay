<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function cadastro(){
        return view('cad_empresa');
    }
}
