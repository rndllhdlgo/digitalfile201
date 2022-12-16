$(document).ready(function(){
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawMonthlyChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawMonthlyChart(chart_data) {
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
        var options =   {
                            title: 'Monthly Sales',
                            hAxis:{
                                    title: 'Months' //Horizontal Axis Title
                            },
                            vAxis:{
                                    title: 'Sales' //Vertical Axis Title
                            },
                            colors:['#FF9900'], //Bar Color
                        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('donut_sales_chart'));
        chart.draw(data, options);
    }

    function load_monthly_data(year, title){
        const temp_title = title + ' ' + year;
        $.ajax({
            url: '/fetch_data',
            method : 'POST',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                year:year
            },
            dataType: "json",
            success:function(data){
                drawMonthlyChart(data, temp_title);
            }
        });
    }

    $('#year').change(function(){
        const year = $('#year').val();

        if(year != ''){
            console.log(year);
            load_monthly_data(year,'Monthly Sales For');
        }
    });
});