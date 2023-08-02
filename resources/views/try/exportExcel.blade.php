@extends('layouts.app')

@section('content')
<br>

<table id="exportExcelTable" class="table table-striped table-hover table-bordered w-100">
    <thead>
        <tr>
            <th colspan="2">Header Group 1</th>
            <th colspan="2">Header Group 2</th>
        </tr>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
            <th>Column 4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Data 1-1</td>
            <td>Data 1-2</td>
            <td>Data 1-3</td>
            <td>Data 1-4</td>
          </tr>
          <tr>
            <td>Data 2-1</td>
            <td>Data 2-2</td>
            <td>Data 2-3</td>
            <td>Data 2-4</td>
          </tr>
    </tbody>
</table>

<button id="exportButton">Export to Excel</button>

<script>
    $(document).ready(function() {
      // Initialize DataTable
      var filename = $('#exportExcelTable').attr('id');

      var dataTable = $("#exportExcelTable").DataTable();
        $('#loading').hide();
      // Add click event to the export button
      $("#exportButton").on("click", function() {
        // Get the header rows
        var headerRows = [];
        $("#exportExcelTable thead tr").each(function() {
            var headerRow = [];
              $(this).find("th").each(function(){
                  var colspan = $(this).attr("colspan");
                  if (colspan && colspan > 1) {
                    for (var i = 0; i < colspan; i++) {
                      headerRow.push($(this).text());
                    }
                  } else {
                    headerRow.push($(this).text());
                  }
              });
              headerRows.push(headerRow);
        });
        console.log(headerRows);
        // Get the data rows
        var dataRows = [];
        $("#exportExcelTable tbody tr").each(function() {
          var dataRow = [];
          $(this).find("td").each(function(){
              dataRow.push($(this).text());
          });
          dataRows.push(dataRow);
        });
        console.log(dataRows);

        // Combine the header rows and data rows
        var allRows = headerRows.concat(dataRows);
        console.log(allRows);
        // Convert data to a worksheet
        var worksheet = XLSX.utils.aoa_to_sheet(allRows);
        console.log(worksheet);

        // Calculate and set cell merges for header rows
        var merges = [];
        for (var i = 0; i < headerRows.length; i++) {
          var row = headerRows[i];
          for (var j = 0; j < row.length; j++) {
            var cellValue = row[j];
            var colspan = 1;
            while (row[j + 1] === cellValue) {
              colspan++;
              j++;
            }
            if (colspan > 1) {
              merges.push({ s: { r: i, c: j - colspan + 1 }, e: { r: i, c: j } });
            }
          }
        }
        worksheet["!merges"] = merges;

        // Create a workbook and add the worksheet to it
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

        // Generate the Excel file
        var excelBuffer = XLSX.write(workbook, { bookType: "xlsx", type: "array" });

        // Save the file using FileSaver.js or your preferred method
        saveAs(new Blob([excelBuffer], { type: "application/octet-stream" }), `${filename}.xlsx`);
      });
    });
    </script>

@endsection