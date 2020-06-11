@extends('layouts.app')

@section('content')

<div class="container">
  <h1 class="display-4 mt-2 mb-5 text-center">Seus Pagamentos Realizados</h1>

  @isset ($cliente)
  <h2>Sua Conta #{{ str_pad($cliente->conta, 10, "0", STR_PAD_LEFT) }}</h2>
  @endisset

  @if (!$transacoes->isEmpty())
  
    <table class="table mt-4 table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Empresa</th>
            <th scope="col">Data e Hora</th>
            <th scope="col">Status</th>
            <th scope="col">Valor</th>
          </tr>
        </thead>
        <tbody>                
          @foreach($transacoes as $t)
            <tr>
              <td>{{ $t->empresa->razaoSocial }}</td>
              <td>{{ date('d/m/Y H:i:s', strtotime($t->data)) }}</td>
              <td>{{ $t->status->nome }}</td>
              <td class="text-danger">- R$ {{ number_format($t->valor,2,',','') }}</td>
            </tr>
          @endforeach
          <tr class="
            @if ($cliente->saldo >= 0)
              table-success
            @else
              table-danger
            @endif
            ">
            <td></td>
            <td></td>
            <td><strong>Seu Saldo</strong></td><td><strong>R$ {{ number_format($cliente->saldo,2,',','') }}</strong></td>
          </tr>
        </tbody>
      </table>
  </div>
  @else
    <p class="text-center">Você não possui pagamentos!</p>
  @endif

@endsection