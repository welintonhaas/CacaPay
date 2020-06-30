@extends('app') 
<!--existe template ou é utilizado o app? criado @yield('scripts') em 
   resources\ layout\ app.blade.php -->
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load('current', {'packages':['bar']});
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Year', 'Sales', 'Expenses', 'Profit'],
       ['2014', 1000, 400, 200],
       ['2015', 1170, 460, 250],
       ['2016', 660, 1120, 300],
       ['2017', 1030, 540, 350]
     ]);
   
     var options = {
       chart: {
         title: 'Company Performance',
         subtitle: 'Sales, Expenses, and Profit: 2014-2017',
       }
     };
   
     var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
   
     chart.draw(data, google.charts.Bar.convertOptions(options));
   }
</script>
@endsection
@section('conteudo')
<!-- A partir daqui vai aparecer o dashboard utizando o Google Charts -->
<div class="row">
   <div class="col-md-6" id="columnchart_material">
   </div>
   <div class="col-md-6">
   </div>
</div>
@endsection