@extends('layouts.app')
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Tempo', 'Cadastro de Clientes x tempo', ],
       @foreach($clientes as $c)
       ['{{ $c->data }}', {{ $c->quant }}],
       @endforeach
     ]);
   
     var options = {
       chart: {
         title: 'Cadastro de Clientes x tempo',
         subtitle: 'Cadastro de Clientes x tempo'
       },
       legend: { position: 'bottom' }
     };
   
     var chart = new google.visualization.AreaChart(document.getElementById('graficoClientes'));
   
     chart.draw(data, options);
   
   }
</script>
<!-- Transacao -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Tempo', 'Cadastro de Transação x tempo' ],
       @foreach($transacao as $t)
       ['{{ $t->data }}', {{ $t->quant }}],
       @endforeach
     ]);
   
     var options = {
       chart: {
         title: 'Cadastro de Transação x tempo',
         subtitle: ''
       },
       curveType: 'function',
       legend: { position: 'bottom' }
     };
   
     var chart = new google.visualization.AreaChart(document.getElementById('graficoTransacao'));
   
     chart.draw(data, options);
   
   }
</script>
<!-- Total de Transações -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Tempo', 'Valor das Transações x tempo' ],
       @foreach($totalTransacao as $tt)
       ['{{ $tt->data }}', {{ $tt->valor }}],
       @endforeach
     ]);
   
     var options = {
       chart: {
         title: 'Total de Transações',
       },
       curveType: 'function',
       legend: { position: 'bottom' }
     };
   
     var chart = new google.visualization.AreaChart(document.getElementById('graficoEmpresas'));
   
     chart.draw(data, options);
   
   }
</script>
@endsection
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h1>Dashboard</h1>   
      </div>
   </div>
   <div class="row mt-4">
      <div class="col-md-4">
   
         <div id="graficoClientes"></div>
      </div>
      <div class="col-md-4">

         <div id="graficoTransacao"></div>
      </div>
      <div class="col-md-4">

         <div id="graficoEmpresas"></div>
      </div>
   </div>

   <div class="row mt-5">
      <div class="col-md-6">
         <h3>Últimos 5 Clientes Cadastrados</h3>
         <table class="table table-striped">
            <thead class="thead-dark">
               <tr>
                  <td scope="col">Nome</td>
                  <td scope="col">Conta</td>
               </tr>
            </thead>
            <tbody>
               @foreach($todosClientes as $regCliente)
               <tr>
                  <td >{{ $regCliente->nome }} </td>
                  <td>{{ $regCliente->conta }} </td>
               </tr>
               @endforeach       
            </tbody>  
         </table>
      </div>
      <div class="col-md-6">
         <h3>Últimas 5 Transações</h3>
         <table class="table table-striped">
            <thead class="thead-dark">
               <tr>
                  <td scope="col">Empresa</td>
                  <td scope="col">CNPJ</td>
                  <td scope="col">Valor da transação</td>
               </tr>
            </thead>
            <tbody>
               @foreach($todasTransacao as $regTransacao)
               <tr>
                  <td >{{ $regTransacao->cliente->nome }} </td>
                  <td >{{ $regTransacao->empresa->razaoSocial }} </td>
                  <td>R$ {{ number_format($regTransacao->valor,2,',','') }}</td>
               </tr>
               @endforeach          
            </tbody>  
         </table>
      </div>
   </div>
</div>

@foreach($totalTransacao as $tt)
data  = {{ date( "Y,m,d",strtotime($tt->data)) }} 
@endforeach
@endsection