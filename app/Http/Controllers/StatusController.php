<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function cadastro(){
        return view('cad_status');
    }
}
