<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Empresa;
use App\Transacoes;
use Auth;

class dashboardController extends Controller{

	function index(){

		if (Auth::user()->Admin()) {

			// Obtem os clientes	
			$clientes = Cliente::selectRaw('DATE(created_at) as data, count(*) as quant')->groupByRaw('DAY(created_at)')->get();
			$todosClientes = Cliente::latest('id')->get()->take(5);

			// Obtem as empresas
			$empresas = Empresa::selectRaw('DATE(created_at) as data, count(created_at) as quant')->groupByRaw('DAY(created_at)')->get();;
			$todasEmpresas = Empresa::latest('id')->get()->take(5);

			// Obtem Transações
			$transacao = Transacoes::selectRaw('DATE(data) as data, count(*) as quant')->groupByRaw('DAY(data)')->get();
			$todasTransacao = Transacoes::latest('id')->get()->take(5);
			$totalTransacao = Transacoes::selectRaw('data, sum(valor) as valor')->groupByRaw('DAY(data)')->get();

			// retorna os dados para view
			return view('dashboard', [	'clientes' => $clientes, 
										'empresas' => $empresas,
										'todosClientes' => $todosClientes,
										'todasEmpresas' => $todasEmpresas, 
										'todasTransacao'=>$todasTransacao,
										'transacao' => $transacao,
										'totalTransacao' => $totalTransacao
										]);
		}

	}
 
}
