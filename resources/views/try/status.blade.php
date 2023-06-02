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

<div>
    <button id="divideButton">Divide Numbers</button>
    <input type="number" id="numeratorInput" placeholder="Numerator">
    <input type="number" id="denominatorInput" placeholder="Denominator">
    <p id="result"></p>
</div>

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
            var fileName = $('#statusTable').attr('id')+".sql";

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

    var inputClicked = false;

    $("#fileInput").on("click", function() {
        $('#loading').show();
        inputClicked = true;
    }).on("change", function() {
        inputClicked = false;
    });

    $(document).on("focusin", function() {
        $('#loading').hide();
        if(inputClicked){
            inputClicked = false;
        }
    });

    $(document).ready(function() {
      $('#divideButton').click(function() {
        try {
          var numerator = parseFloat($('#numeratorInput').val());
          var denominator = parseFloat($('#denominatorInput').val());

          if (isNaN(numerator) || isNaN(denominator)) {
            throw new Error("Please enter valid numbers.");
          }

          var result = numerator / denominator;
          $('#result').text("Division result: " + result);
        } catch (error) {
          $('#result').text("An error occurred: " + error.message);
        } finally {
          $('#numeratorInput').val('');
          $('#denominatorInput').val('');
        }
      });
    });
</script>
@endsection