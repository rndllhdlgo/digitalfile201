@extends('layouts.app')

@section('content')

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Name', 'Name Count'],
      <?php echo $chartData?>
    ]);

    var options = {
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>
// <script type="text/javascript">
//       google.charts.load('current', {'packages':['bar']});
//       google.charts.setOnLoadCallback(drawChart);

//       function drawChart() {
//         var data = google.visualization.arrayToDataTable([
//           ['Names', 'Name Count'],
//           <?php echo $chartData?>
//         ]);

//         var options = {
//           chart: {
//             title: 'List of Names',
//           },
//           bars: 'horizontal' // Required for Material Bar Charts.
//         };

//         var chart = new google.charts.Bar(document.getElementById('barchart_material'));

//         chart.draw(data, google.charts.Bar.convertOptions(options));
//       }
// </script>
<br>
<input type="text" id="name" autocomplete="off">
<br><br>
    <button type="button" id="btnChartSave">Save</button>
<br>
<hr>
<div class="row">
    <div class="col">
      <div id="piechart" style="width: 100%; height: 500px;border:1px solid black;"></div>
    </div>
    
    <div class="col">
      <div id="barchart_material" style="width: 100%; height: 500px;border:1px solid black; padding:5px;"></div>
    </div>
</div>
<hr>
@endsection