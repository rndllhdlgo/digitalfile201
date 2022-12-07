<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Donut</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('js/donut/sales_by_month.js')}}"></script>
        
    <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://www.google.com/jsapi"></script>
  </head>

<body>
    <div class="card-body">
        <div class="row">
            <div class="col-md-9">
         
            </div>
            <div class="col-md-3">
                <select name="year" id="year" class="form-control">
                    <option value="" disabled selected>SELECT YEAR</option>
                    @foreach($year_list as $row)
                        <option value="{{$row->year}}">{{$row->year}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="panel-body">
            <div id="sales_by_month_chart" style="width: 100%; height: 600px;"></div>
        </div>
    </div>
</body>
</html>