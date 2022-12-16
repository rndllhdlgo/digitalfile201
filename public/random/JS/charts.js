$('#btnChartSave').on('click',function(){
    var name = $('#name').val();

    $.ajax({
        url: '/chartsSave',
        type: "post",
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            name:name
        },
        success:function(data){
            if(data == 'true'){
                console.log('success');
                setTimeout(function(){ window.location.reload(); }, 1000);
            }
            else{
                console.log('failed');
                setTimeout(function(){ window.location.reload(); }, 1000);
            }
        }
    });
});

$('#btnTechnologySave').on('click',function(){
    var device_name = $('#device_name').val();
    var quantity = $('#quantity').val();

    $.ajax({
        url: '/technologySave',
        type: "post",
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            device_name:device_name,
            quantity:quantity
        },
        success:function(data){
            if(data == 'true'){
                console.log('success');
                setTimeout(function(){ window.location.reload(); }, 2000);
            }
            else{
                console.log('failed');
                setTimeout(function(){ window.location.reload(); }, 2000);
            }
        }
    });
});

$('#btnSaveName').on('click',function(){
    var name = $('#name').val();

    $.ajax({
        url: '/saveData',
        type: "post",
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            name:name
        },
        success:function(data){
            if(data == 'true'){
                console.log('save success');
                setTimeout(function(){ window.location.reload(); }, 1000);
            }
            else{
                console.log('save failed');
                setTimeout(function(){ window.location.reload(); }, 1000);
            }
        }
    });
});

    // google.charts.load('current', {'packages':['corechart']});
    // google.charts.setOnLoadCallback(function(){
    // load_data();
    // });

    // function drawChart(drawChart) {
    // let jsonData = drawChart;
    // var data = google.visualization.arrayToDataTable([]);
    // data.addColumn({type:'string', label: 'Name'});
    // data.addColumn({type:'number', label: 'Sales'});

    
    // $.each(jsonData,(i, jsonData) => {
    //     console.log(jsonData);
    //     let name = jsonData.name;
    //     let total_sales = jsonData.total_sales;
    //     data.addRows([
    //         [name, total_sales]
    //     ]);
    // });
    // var options = {
    //     title: 'My Daily Activities'
    // };

    // var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    // chart.draw(data, options);
    // }

    // function load_data(){
    //     $.ajax({
    //         url:'fetchData',
    //         method: 'GET',
    //         headers:{
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         dataType: "JSON",
    //         success:function(data){
    //             drawChart(data);
    //         }
    //     });
    // }

// Characters View
$('#btnCharacterSave').on('click',function(){
    var character_name = $('#character_name').val();

    $.ajax({
        url: '/charactersSave',
        type: "post",
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            character_name:character_name
        },
        success:function(data){
            if(data == 'true'){
                console.log('save success');
                // setTimeout(function(){ window.location.reload(); }, 1000);
            }
            else{
                console.log('save failed');
                // setTimeout(function(){ window.location.reload(); }, 1000);
            }
        }
    });
});


    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(function(){
        load_characters_data();
    });

    function drawChart(drawChart) {
    let jsonData = drawChart;
    var data = google.visualization.arrayToDataTable([]);
    data.addColumn({type:'string', label:'Character Name'});
    data.addColumn({type:'number', label:'Quantity'});

    $.each(jsonData, (i, jsonData) => {
        let character_name = jsonData.character_name;
        let total_characters = jsonData.total_characters;
        data.addRows([
            [character_name, total_characters]
        ]);
    });
    var options = {
        title: 'Characters'
    };

    var chart = new google.visualization.PieChart(document.getElementById('character_chart'));

    chart.draw(data, options);
    }

    function load_characters_data(){

        $.ajax({
            url: '/charactersData',
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
  
