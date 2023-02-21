@extends('layouts.app')

@section('content')
<br>

<table class="table table-striped table-hover table-bordered w-100 align-middle exportTable" id="exportTable">
    <thead>
        <tr class="bg-default">
            <th>EXPORT</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    $('#loading').hide();

    var table;
$(document).ready(function(){
    table = $('table.exportTable').DataTable({
        dom: 'Blftrip',
        buttons: [{
            extend: 'excelHtml5',
            title: 'Export',
            exportOptions: {
                modifier : {
                    order : 'index',
                    page : 'all',
                    search : 'none'
                },
            },
        }],
        aLengthMenu:[[10,25,50,100,500,1000,-1], [10,25,50,100,500,1000,"All"]],
        processing: true,
        serverSide: false,
        ajax: {
            url: 'export_data'
        },
        columns: [
            { data: 'empno', name:'empno'}
        ],
        initComplete: function(){
            $('#loading').hide();
        }
    });
});
</script>
@endsection