@extends('layouts.app')
@section('content')

<br>
<select class="form-select" aria-label="Default select example" id="chart_select">
    <option selected disabled>SELECT CHART</option>
    <option value="1">Bar Chart</option>
    <option value="2">Pie Chart</option>
</select>
<br>

<select class="form-select" aria-label="Default select example" id="bar_type" style="display:none;">
    <option selected disabled>SELECT BAR</option>
    <option value="1">Horizontal</option>
    <option value="2">Vertical</option>
</select>
<br>
<div id="chart_material" style="display:none;"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $('#loading').hide();

    $(document).on('change', '#chart_select', function() {
        $('#chart_material').empty();
        var chartType = $('#chart_select').val();
        if(chartType == '2'){
            $('#bar_type').hide();
            $('#chart_material').show();
            chartDraw(chartType);
        }
        else{
            $('#bar_type').show();
            $('#bar_type').on('change',function(){
                if($(this).val() == '1'){
                    var bar_type = 'horizontal';
                    $('#chart_material').show();
                    chartDraw(chartType, bar_type);
                }
                else{
                    var bar_type = 'vertical';
                    $('#chart_material').show();
                    chartDraw(chartType, bar_type);
                }
            });
        }

        google.charts.load('current', { 'packages': ['bar', 'corechart'] });
        google.charts.setOnLoadCallback(chartDraw);

        function chartDraw(chartType, bar_type) {
            $.ajax({
                url: '/google_chart_data',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = google.visualization.arrayToDataTable(response);
                    var chart;

                    if(chartType == '1'){
                        var options = {
                            chart: {
                                title: 'GENDER',
                            },
                            bars: bar_type
                        };

                        chart = new google.charts.Bar(document.getElementById('chart_material'));
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                    else if(chartType == '2'){
                        var options = {
                            title: 'GENDER',
                        };

                        chart = new google.visualization.PieChart(document.getElementById('chart_material'));
                        chart.draw(data, options);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
</script>
@endsection