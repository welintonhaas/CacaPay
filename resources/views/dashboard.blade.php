@extends('layouts.app')
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Tempo', 'Clientes', ],
       @foreach($clientes as $c)
       [new Date({{ date( "Y,m,d",strtotime($c->data)) }}), {{ $c->quant }}],
       @endforeach
     ]);
   
     var options = {
       chart: {
         title: 'Clientes',
         subtitle: 'Cadastro de Clientes x tempo'
       },
       curveType: 'function',
       legend: { position: 'bottom' }
     };
   
     var chart = new google.visualization.LineChart(document.getElementById('graficoClientes'));
   
     chart.draw(data, options);
   
   }
</script>
<!-- Empresas -->
<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Tempo', 'Empresas', ],
       @foreach($empresas as $e)
       [new Date({{ date( "Y,m,d",strtotime($e->data)) }}), {{ $e->quant }}],
       @endforeach
     ]);
   
     var options = {
       chart: {
         title: 'Empresas',
         subtitle: 'Cadastro de Empresas x tempo'
       },
       curveType: 'function',
       legend: { position: 'bottom' }
     };
   
     var chart = new google.visualization.LineChart(document.getElementById('graficoEmpresas'));
   
     chart.draw(data, options);
   
   }
</script>
@endsection
@section('content')
<div class="container">
   <div class="col">
      <h1>Dashboard</h1>
   </div>
   <div class="row">
      <div class="col-md-6">
         <h2>Cadastro de Clientes</h2>
         <div id="graficoClientes"></div>
      </div>
      <div class="col-md-6">
         <h2>Cadastro de Empresas</h2>
         <div id="graficoEmpresas"></div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <h2>Ultimos 5 Clientes Cadastrados</h2>
         @foreach($todosClientes as $regCliente)
         {{$regCliente->nome }} 
         {{$regCliente->conta }} <br>
         @endforeach
         <a href="#">Listar Todos Clientes</a>
      </div>
      <div class="col-md-6">
         <h2> Ultimas 5 Empresas Cadastradas</h2>
         @foreach($todasEmpresas as $regEmpresas)
         {{$regEmpresas->razaoSocial }} 
         {{$regEmpresas->CNPJ }} <br>
         @endforeach
          <a href="#">Listar Todas as Empresas</a>

      </div>
   </div>
</div>
@endsection