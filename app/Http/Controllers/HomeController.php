<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transacoes;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pagamentos()
    {   
        $idUser = Auth::id();
        $idCliente = User::find($idUser)->idCliente;
        $tr = Transacoes::where('idCliente',$idCliente)->get();
        return view('pagamentos', ['transacoes'=>$tr]);
    }
}
