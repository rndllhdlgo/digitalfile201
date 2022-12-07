<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Donut Sales</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.google.com/jsapi"></script>

    <script src="{{asset('js/charts/donut_sales.js')}}"></script>

</head>
<body>
    <div class="container">
        <br>
        <select name="year" id="year">
            <option value="" disabled selected>SELECT YEAR</option>
            @foreach($year_list as $row)
                <option value="{{$row->year}}">{{$row->year}}</option>
            @endforeach
        </select>
        <div id="donut_sales_chart" style="width: 900px; height: 500px;"></div> 
    </div>
</body>
</html>