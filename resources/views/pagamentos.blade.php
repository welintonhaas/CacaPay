@extends('layouts.app')

@section('content')

<div class="container">
  <h1 class="display-4 mt-2 mb-5 text-center">Seus Pagamentos Realizados</h1>

  <h2>Conta # {{ str_pad($cliente->conta, 10, "0", STR_PAD_LEFT) }}</h2>
  @if (!$transacoes->isEmpty())
  
    <table class="table mt-4">
        <thead>
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
              <td>R$ {{ number_format($t->valor,2,',','') }}</td>
            </tr>
          @endforeach
          {{-- TODO Adicionar Saldo --}}
        </tbody>
      </table>
  </div>
  @else
    <p class="text-center">Você não possui pagamentos!</p>
  @endif

@endsection