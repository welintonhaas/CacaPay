<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transacoes;
use App\User;
use App\Cliente;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }

    public function pagamentos()
    {   
        // Obtem o id do usuário da sessão
        $idUser = Auth::id();

        // A partir do usuário da sessão, obtem o id de cliente associado
        $idCliente = User::find($idUser)->idCliente;

        // Obtem os dados do cliente 
        $cliente = Cliente::find($idCliente);

        // Obtem as transações do cliente
        $transacoes = Transacoes::where('idCliente',$idCliente)->get();

        // Retorna para a view pagamento os dados 
        return view('pagamentos', ['transacoes'=>$transacoes, 'cliente'=>$cliente]);

    }
}
