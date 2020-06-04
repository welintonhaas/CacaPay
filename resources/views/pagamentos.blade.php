@extends('layouts.app')

@section('content')

<div class="container">
  <h1 class="display-4 mt-2">Pagamentos Realizados</h1>
  <table class="table mt-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Valor</th>
          <th scope="col">Empresa</th>
          <th scope="col">Cliente</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>          
        @foreach($transacoes as $t)
          <tr>
            <th scope="row">{{ $t->id }}</th>
            <td>R$ {{ number_format($t->valor,2,',','') }}</td>
            <td>{{ $t->empresa->razaoSocial }}</td>
            <td>{{ $t->cliente->nome }}</td>
            <td>{{ $t->status->nome }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection