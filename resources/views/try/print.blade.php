@extends('layouts.app')
@section('content')
<br>
<table id="data-table" class="table table-bordered">
  <thead>
      <tr>
          <th colspan="4">Header Title</th>
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
          <td>Data 1</td>
          <td>Data 2</td>
          <td>Data 3</td>
          <td>Data 4</td>
      </tr>
      <!-- Add more rows as needed -->
  </tbody>
</table>

<!-- Add a button to trigger the export -->
<button id="export-button">Export to Excel</button>

<script>
  $('#loading').hide();
  $(document).ready(function () {
            // Select the table element
            const $table = $('#data-table');

            // Get the table rows and columns
            const $rows = $table.find('tbody tr');
            const $headerCells = $table.find('thead th');

            // Function to handle the export
            function exportToExcel() {
                // Create a new 2D array to hold the transposed data
                const transposedData = [];

                // Transpose the data
                $headerCells.each(function (headerIndex) {
                    const rowData = [];
                    const colspan = parseInt($(this).attr('colspan')) || 1;

                    $rows.each(function (rowIndex) {
                        const $cell = $(this).find('td').eq(headerIndex % colspan);
                        rowData.push($cell.text());
                    });

                    transposedData.push(rowData);
                });

                // Create a new Workbook and add the transposed data
                const wb = XLSX.utils.book_new();
                const ws = XLSX.utils.aoa_to_sheet(transposedData);
                XLSX.utils.book_append_sheet(wb, ws, 'Transposed Data');

                // Export the Workbook to an Excel file
                const excelBlob = XLSX.write(wb, { bookType: 'xlsx', type: 'blob' });
                const excelFileName = 'transposed_data.xlsx';

                // Create a download link and trigger the download
                const downloadLink = document.createElement('a');
                downloadLink.href = window.URL.createObjectURL(excelBlob);
                downloadLink.download = excelFileName;
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            }

            // Attach the export function to the button click event
            $('#export-button').click(exportToExcel);
        });
</script>
@endsection