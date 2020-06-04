<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transacoes;

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
        $tr = Transacoes::all();
        return view('pagamentos', ['transacoes'=>$tr]);
    }
}
