<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/inc/bootstrap.min.css">
    <link rel="stylesheet" href="/css/inc/bootstrap-icons.css">
    <link href="/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css"/>
    <link href="/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <script src="/js/inc/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/all.css">
    <link href="/DataTables/datatables.min.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
    <div style="zoom:85%;">
        <button type="button" class="btn btn-primary" id="btnSaveHmo">SAVE</button>
        <table class="table table-striped table-bordered table-hover align-middle" id="hmoTable">
            <thead class="thead-design">
                <tr>
                    <th colspan="8" style="zoom:120% !important;">HEALTHCARE MAINTENANCE ORGANIZATION</th>
                </tr>
                <tr>
                    <th style="width:15%;">HMO</th>
                    <th style="width:15%;">COVERAGE</th>
                    <th style="width:15%;">PARTICULARS</th>
                    <th style="width:15%;">ROOM</th>
                    <th style="width:15%;">EFFECTIVITY DATE</th>
                    <th style="width:15%;">EXPIRATION DATE</th>
                    <th style="width:5%;">STATUS</th>
                    <th style="width:5%;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="search" id="hmo" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="hmo" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="text" id="coverage" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="coverage" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="text" id="particulars" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="particulars" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase" type="text" id="room" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="room" class="formlabel form-label"></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="date" id="effectivity_date" placeholder=" " style="background-color:white;">
                            <label for="effectivity_date" class="formlabel form-label">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control" type="date" id="expiration_date" placeholder=" " style="background-color:white;">
                            <label for="expiration_date" class="formlabel form-label">
                        </div>
                    </td>
                    <td class="pb-3 pt-3"></td>
                    <td class="pb-3 pt-3">
                        <button type="button" id="hmoAdd" class="btn btn-success center" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped" id="hmo_data_table" style="display:none;">
            <thead>
                <tr>
                    <th>HMO</th>
                    <th>Coverage</th>
                    <th>Particulars</th>
                    <th>Room</th>
                    <th>Effectivity Date</th>
                    <th>Expiration Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
<script src="/js/inc/bootstrap.bundle.min.js"></script>
<script src="/js/inc/moment.js"></script>
<script src="/DataTables/datatables.min.js"></script>

<script>
    $(document).ready(function(){
        $('#hmo').val('INTELLICARE');
        $('#coverage').val('75,000');
        $('#particulars').val('PER DISEASE/HOSPITALIZATION');
        $('#room').val('SEMI PRIVATE');
        $('#effectivity_date').val('2024-01-01');
        $('#expiration_date').val('2024-01-01');
    });

    $('#hmoAdd').on('click', function(){
        var hmo              = $('#hmo').val();
        var coverage         = $('#coverage').val();
        var particulars      = $('#particulars').val();
        var room             = $('#room').val();
        var effectivity_date = $('#effectivity_date').val();
        var expiration_date  = $('#expiration_date').val();

        $('#hmoTable tbody tr:first').after(
                        `<tr class="tr_hmo">
                            <td class="text-center">
                                <input name="hmo" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off" value="${hmo}" readonly>
                            </td>
                            <td>
                                <input name="coverage" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off" value="${coverage}" readonly>
                            </td>
                            <td>
                                <input name="particulars" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off" value="${particulars}" readonly>
                            </td>
                            <td>
                                <input name="room" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off" value="${room}" readonly>
                            </td>
                            <td>
                                <input name="effectivity_date" class="forminput form-control" type="date" placeholder=" " style="background-color:white;" value="${effectivity_date}" readonly>
                            </td>
                            <td>
                                <input name="expiration_date" class="forminput form-control" type="date" placeholder=" " style="background-color:white;" value="${expiration_date}" readonly>
                            </td>
                            <td>
                                ACTIVE
                            </td>
                            <td>
                                <button type="button" class="btn btn-success center addRow"><i class="fas fa-plus"></i></button>
                            </td>
                        </tr>`);
        $('#hmo').val('');
        $('#coverage').val('');
        $('#particulars').val('');
        $('#room').val('');
        $('#effectivity_date').val('');
        $('#expiration_date').val('');
    });

    $(document).on('click', '.addRow', function(){
        var first_rowspan = parseInt($(this).closest('tr').find('td:first').attr('rowspan')) || 1;
        first_rowspan++;
        $(this).closest('tr').find('td:first').attr('rowspan', first_rowspan);
        var second_rowspan = parseInt($(this).closest('tr').find('td:last-child').attr('rowspan')) || 1;
        second_rowspan++;
        $(this).closest('tr').find('td:last-child').attr('rowspan', second_rowspan);
        var third_rowspan = parseInt($(this).closest('tr').find('td:nth-last-child(2)').attr('rowspan')) || 1;
        third_rowspan++;
        $(this).closest('tr').find('td:nth-last-child(2)').attr('rowspan', third_rowspan);

        var newRow = `
                <tr class="tr_hmo">
                    <td>
                        <input name="coverage" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off">
                    </td>
                    <td>
                        <input name="particulars" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off">
                    </td>
                    <td>
                        <input name="room" class="forminput form-control" type="text" placeholder=" " style="background-color:white;">
                    </td>
                    <td>
                        <input name="effectivity_date" class="forminput form-control" type="date" placeholder=" " style="background-color:white;">
                    </td>
                    <td>
                        <input name="expiration_date" class="forminput form-control" type="date" placeholder=" " style="background-color:white;">
                    </td>
                </tr>`;
        $(this).closest('tr').after(newRow);
    });

    $('#btnSaveHmo').on('click', function(){
        $('.tr_hmo').each(function(){
            var row = $(this);
            $.ajax({
                type: 'POST',
                url: '/rowspan_save',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    employee_id      : 550,
                    hmo              : row.find('input[name="hmo"]').val(),
                    coverage         : row.find('input[name="coverage"]').val(),
                    particulars      : row.find('input[name="particulars"]').val(),
                    room             : row.find('input[name="room"]').val(),
                    effectivity_date : row.find('input[name="effectivity_date"]').val(),
                    expiration_date  : row.find('input[name="expiration_date"]').val()
                },
                success:function(response){
                }
            });
        });
    });
</script>
</body>
</html>

