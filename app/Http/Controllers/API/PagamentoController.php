<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use App\Empresa;
use App\Cliente;
use App\Transacoes;

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
        $empresa = Empresa::where('token', $dados['token'])->first() ?: abort(403);
   
        // Obtem o valor da transaçãp
        $valor = isset($dados['valor']) ? $dados['valor'] : abort(402);
        
        // Chama a controller para caso seja necessário criar um novo Cliente
        $novoCliente = new ClienteController; 
        
        // Obtem o cliente, caso não exista, cadastra!
        $cliente = Cliente::where('cpf', $dados['cpf'])->first() ?: $novoCliente->cadastrarAPI($dados);

        // Verifica se o cliente tem saldo suficiente para compra
        if( $cliente->saldo < $valor ){
            $status = 2;
        }else {
            $saldo = $cliente->saldo;
            $status = 1;
        } 

        // Dados da Transação
        $trasacao = new Transacoes;
        $trasacao->valor = $valor;
        $trasacao->idEmpresa = $empresa->id;
        $trasacao->idStatus = $status;
        $trasacao->idCliente = $cliente->id;

        try {
            $trasacao->save();
        }catch( Exception $e){
            abort(401);
        }
        
        // Transação Gravada com sucesso
        if ($status == 1){
            $cliente->saldo = $saldo-$valor;
            $cliente->save();
            abort(201);

        // Falha na Transação
        }else {
            abort(401);
        }    
        
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
