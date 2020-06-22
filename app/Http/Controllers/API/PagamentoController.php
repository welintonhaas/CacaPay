<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use App\Empresa;
use App\Cliente;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Obtem os Dados informados 
        $dados = json_decode($request->getContent(), true);

        // "Autenticação"
        $empresa = Empresa::where('token', $dados['token'])->first() ?: abort(401);

        // Chama a controller para caso seja necessário criar um novo Cliente
        $novoCliente = new ClienteController; 
        
        // Obtem o cliente, caso não exista, cadastra!
        $cliente = Cliente::where('cpf', $dados['cpf'])->first() ?: $novoCliente->cadastrarAPI($dados);

        // Retorna o Cliente Solicitado e os dados
        return $cliente;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
