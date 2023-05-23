@extends('layouts.app')

@section('content')
<br>
<button id="export-btn">Export to SQL</button>
<input type="file" id="fileInput">

<table class="table table-striped" id="statusTable">
    <thead class="thead-educational">
        <tr>
            <th>ID</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<textarea class="form-control text-uppercase separated" id="allergies" rows="5" style="resize: none;" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>

<script>
    var table;
    $(document).ready(function(){
        table = $('table#statusTable').DataTable({
            processing:true,
            serverSide:false,
            ajax: {
                url: '/status_data',
            },
            order: [],
            columns: [
                {data: 'id'},
                {data: 'stat'},
            ],
        });
    });

    $(document).ready(function() {
        $('#export-btn').click(function() {
            var rows = $('#statusTable').DataTable().rows().data();
            var sql = '';

            rows.each(function(rowData) {
                var values = Object.values(rowData);
                var insertStatement = "INSERT INTO table_name (column1, column2, column3) VALUES ('" + values.join("', '") + "');\n";
                sql += insertStatement;
            });
            var blob = new Blob([sql], { type: 'text/sql' });
            var fileName = $('#statusTable').attr('id');

            if(window.navigator.msSaveOrOpenBlob){
                window.navigator.msSaveOrOpenBlob(blob, fileName);
            }
            else{
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = fileName;
                link.click();
            }
        });
    });

    $('#loading').hide();

    $(document).ready(function() {
        $('#fileInput').click(function() {
            // Show the loading element when the file input is clicked
            $('#loading').show();
        });

        $('#fileInput').change(function() {
            // Hide the loading element when the file selection is made
            $('#loading').hide();
        });
    });
</script>
@endsection