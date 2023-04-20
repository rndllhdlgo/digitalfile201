@extends('layouts.app')

@section('content')
<br>

<table class="table table-striped" id="statusTable">
    <thead class="thead-educational">
        <tr>
            <th>FULL NAME</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script>
    var table;
    $(document).ready(function(){
        table = $('table#statusTable').DataTable();
    });
    $('#loading').hide();
</script>
@endsection