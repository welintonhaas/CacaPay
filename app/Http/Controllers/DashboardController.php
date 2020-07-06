<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Empresa;
use Auth;

class dashboardController extends Controller{

	function index(){

		if (Auth::user()->Admin()) {

			// Obtem os clientes	
			$clientes = Cliente::selectRaw('created_at as data, count(created_at) as quant')->groupByRaw('DAY(created_at)')->get();

			$todosClientes = Cliente::latest('id')->get()->take(5);

			// Obtem as empresas
			$empresas = Empresa::selectRaw('created_at as data, count(created_at) as quant')->groupByRaw('DAY(created_at)')->get();;

			// retorna os dados para view
			return view('dashboard', ['clientes' => $clientes, 'empresas' => $empresas, 'todosClientes' => $todosClientes]);
		}

	}
 
}
