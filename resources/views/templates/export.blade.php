@extends('layouts.app')

@section('content')
<br>

<table class="table table-striped table-hover table-bordered w-100 align-middle exportTable" id="exportTable">
    <thead class="thead-design">
        <tr>
            <th>FIRST NAME</th>
            <th>MIDDLE NAME</th>
            <th>LAST NAME</th>
            <th>GENDER</th>
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
            processing: true,
            serverSide: false,
            ajax: {
                url: '/export_data'
            },
            columns: [
                { data: 'first_name',  name: 'first_name'},
                { data: 'middle_name', name: 'middle_name'},
                { data: 'last_name',   name: 'last_name'},
                { data: 'gender',      name: 'gender'}
            ],
            initComplete: function(){
                $('#loading').hide();
            }
        });
    });
</script>
@endsection