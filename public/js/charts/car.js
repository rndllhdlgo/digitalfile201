$('#btnCarSave').on('click',function(){
    var car_name = $('#car_name').val();
    
    $.ajax({
        url:'/carsSave',
        type:'post',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            car_name:car_name
        },
        success:function(data){
            setTimeout(function(){ window.location.reload(); }, 1000);
        }
    });
});

function load_cars_data(){
    $.ajax({
        url: '/carsFetch',
        method: 'GET',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success:function(data){
            drawChart(data);
        }   
    });
}

//Display Chart
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(function(){
        load_cars_data();
    });

    function drawChart(drawChart) {
    let jsonData = drawChart;
    var data = google.visualization.arrayToDataTable([]);
    data.addColumn('string','Car Name');
    data.addColumn('number', 'Quantity');

    $.each(jsonData, (i, jsonData) => {
        let car_name = jsonData.car_name;
        let total_cars = jsonData.total_cars;
        data.addRows([
            [car_name, total_cars]
        ]);
    });
    var options = {
        title: 'List of Cars'
    };

    var chart = new google.visualization.PieChart(document.getElementById('car_chart'));

    chart.draw(data, options);
    }