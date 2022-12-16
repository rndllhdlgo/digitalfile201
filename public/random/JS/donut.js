$(document).ready(function(){
   // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawMonthlyChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawMonthlyChart(chart_data, chart_main_title) {
        let jsonData = chart_data;
        // Create the data table.
        let data = new google.visualization.DataTable();
            data.addColumn('string', 'Months');
            data.addColumn('number', 'Profit');
            $.each(jsonData, (i, jsonData) => {
                let month = jsonData.month;
                let profit = parseFloat($.trim(jsonData.profit));
                data.addRows([
                    [month, profit]
                ]);
            });
        
        // Set chart options
        var options = {
                        title: chart_main_title,
                        hAxis: {
                            title: "Months"
                        },
                        vAxis: {
                            title: "Profit"
                        },
                        colors: ['black'],
                        
                        chartArea: {
                            width: '50%',
                            height: '80%'
                        }
                    };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

    function load_monthly_data(year, title){
        const temp_title = title + ' ' + year;
        $.ajax({
            url:'/fetch_data',
            method :'POST',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                year:year
            },
            dataType:"JSON",
            success:function(data){
                drawMonthlyChart(data, temp_title);
            }
        });
    }

    $('#year').change(function() {
        var year = $(this).val();
        if(year != '') {
            load_monthly_data(year, 'Monthly Sales for:');
        }
    });
});