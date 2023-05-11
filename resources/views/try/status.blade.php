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

<textarea class="form-control text-uppercase separated" id="allergies" rows="5" style="resize: none;" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>

<script>
    var table;
    $(document).ready(function(){
        table = $('table#statusTable').DataTable();
    });
    $('#loading').hide();
</script>
@endsection