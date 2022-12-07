@extends('layouts.app')

@section('content')
<br>
<input type="text" id="device_name"><br><br>
<input type="text" id="quantity"><br><br>
<button type="button" id="btnTechnologySave">SAVE</button>

<hr>
    <script type="text/javascript">
        var technologyData = @json($technologyData);

        window.onload = function(){
            google.load("visualization","1.1",{
                packages:["corechart"],
                callback:'drawChart'
            });
        };

        function drawChart(){

            var data = new google.visualization.DataTable();
            data.addColumn('string','');
            data.addColumn('string','');

            data.addRows(technologyData);

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data);
        }
    </script>

<div id="piechart" style="width: 900px; height: 500px;"></div>

@endsection