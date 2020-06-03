@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="display-4 mt-2">Pagamentos Realizados</h1>
    <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          @foreach($clientes as $c)
            <tr>
              <th scope="row">1</th>
              <td>{{ $c->nome }}</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection