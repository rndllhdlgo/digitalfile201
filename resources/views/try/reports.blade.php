@extends('layouts.app')
@section('content')
<br>
<div class="row">
    <div class="col-3"></div>
    <div class="col-4">
        <div class="f-outline">
            {{-- <input type="month" class="forminput form-control" id="month_report"> --}}
            <input type="month" class="forminput form-control" id="month_report">

        </div>
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary" id="month_submit">SUBMIT</button>
    </div>
    <div class="col-3"></div>
</div>
<br>
<ul class="nav nav-tabs" style="border-color:#0d1a80;" role="tablist">
    <li class="nav-item">
        <a class="nav-link pill" id="tab1" data-bs-toggle="tab" href="#ebook"> EBOOK</a>
    </li>
        <li class="nav-item">
            <a class="nav-link pill" id="tab2" data-bs-toggle="tab" href="#sales"> SALES</a>
        </li>
    <li class="nav-item">
        <a class="nav-link pill" id="tab3" data-bs-toggle="tab" href="#end"> END OF DAY</a>
    </li>
    <li class="nav-item">
        <a class="nav-link pill" id="tab4" data-bs-toggle="tab" href="#terminal"> TERMINAL</a>
    </li>
</ul>
<br>
<div id="ebook" class="tab-pane active" style="border-radius:0px;">
    <table class="table table-striped ebookTable w-100" id="ebookTable">
        <thead>
            <tr>
                <th>FILENAME</th>
                <th>BRANCH</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<div id="sales" class="tab-pane active" style="border-radius:0px;display:none">

</div>
<div id="end" class="tab-pane active" style="border-radius:0px;display:none;">

</div>
<div id="terminal" class="tab-pane active" style="border-radius:0px;display:none;">

</div>

<script>

$('#loading').hide();

// $('#month_submit').on('click', function() {
//     var selectedMonth = $('#month_report').val().split('-')[1];
//     var selectedYear = $('#month_report').val().split('-')[0];
//     var url = '/reports_data?selectedMonth='+selectedMonth+'&selectedYear='+selectedYear;
//     table.ajax.url(url).load();
// });

var table;
$(document).ready(function(){
    table = $('table.ebookTable').DataTable({
        autoWidth:false,
    });
});

    $('#month_submit').on('click', function() {
        var selectedMonth = $('#month_report').val().substring(5);
        var selectedYear = $('#month_report').val().substring(0, 4);
        var url = '/reports_data?selectedMonth='+selectedMonth+'&selectedYear='+selectedYear;

        $('table.ebookTable').dataTable().fnDestroy();
        table = $('table.ebookTable').DataTable({
            dom: 'lftrip',
            processing: true,
            serverSide: false,
            ajax: {
                url: url
            },
            columns: [
                { data: 'filename'},
                { data: 'branch'},
            ],
            initComplete: function(){
                $('#loading').hide();
            }
        });
    });

$(document).on('click','table.ebookTable tbody tr',function(){
    if(!table.data().any()){ return false; }
    var data = table.row(this).data();
    var id = data.id;
    window.open('/storage/reports/' + data.filename, '_blank');
});


$('#tab1').on('click',function(){
    $(this).blur();
    $('#tab1').addClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');

    $('#ebook').fadeIn();
    $('#sales').hide();
    $('#end').hide();
    $('#terminal').hide();
});

$('#tab2').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').addClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');

    $('#ebook').hide();
    $('#sales').show();
    $('#end').hide();
    $('#terminal').hide();
});

$('#tab3').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').addClass('tabactive');
    $('#tab4').removeClass('tabactive');

    $('#ebook').hide();
    $('#sales').hide();
    $('#end').show();
    $('#terminal').hide();
});

$('#tab4').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').addClass('tabactive');

    $('#ebook').hide();
    $('#sales').hide();
    $('#end').hide();
    $('#terminal').show();
});

</script>
@endsection