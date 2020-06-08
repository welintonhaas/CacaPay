@extends('layouts.app')

@section('content')

<div class="container">
  <h1 class="display-4 mt-2 text-center">Seus Pagamentos Realizados</h1>

  @if (!$transacoes->isEmpty())
  
    <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">Conta</th>
            <th scope="col">Valor</th>
            <th scope="col">Empresa</th>
            <th scope="col">Data e Hora</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>          
          @foreach($transacoes as $t)
            <tr>
              <th scope="row">{{ str_pad($t->conta, 10, "0", STR_PAD_LEFT) }}</th>
              <td>R$ {{ number_format($t->valor,2,',','') }}</td>
              <td>{{ $t->empresa->razaoSocial }}</td>
              <td>{{ date('d/m/Y H:i:s', strtotime($t->data)) }}</td>
              <td>{{ $t->status->nome }}</td>
            </tr>
          @endforeach
          //TODO Adicionar Saldo
        </tbody>
      </table>
  </div>
  @else
    <p class="text-center ">Você não possui pagamentos!</p>
  @endif

@endsection