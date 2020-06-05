<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditoController extends Controller
{
    public function cadastro(){
 
        return view('cad_credito');
    }
}
