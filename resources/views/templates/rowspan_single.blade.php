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
    <div>
        <button type="button" class="btn btn-primary" id="btnSaveHmo">SAVE</button>
        <table class="table table-striped table-bordered table-hover align-middle w-100" id="hmoTable">
            <thead class="thead-design">
                <tr>
                    <th colspan="8" style="zoom:120% !important;">HEALTHCARE MAINTENANCE ORGANIZATION</th>
                </tr>
                <tr>
                    <th style="width:15%;" class="fixedCol">HMO</th>
                    <th style="width:15%;" class="fixedCol">COVERAGE</th>
                    <th style="width:15%;">PARTICULARS</th>
                    <th style="width:15%;">ROOM</th>
                    <th style="width:15%;">EFFECTIVITY DATE</th>
                    <th style="width:15%;">EXPIRATION DATE</th>
                    <th style="width:5%;">STATUS</th>
                    <th style="width:5%;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr_hmo">
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input name="hmo" class="forminput form-control text-uppercase" type="search" id="hmo" placeholder=" " style="background-color:white;" autocomplete="off">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input name="coverage" class="forminput form-control text-uppercase" type="search" id="coverage" placeholder=" " style="background-color:white;" autocomplete="off">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input name="particulars" class="forminput form-control text-uppercase" type="search" id="particulars" placeholder=" " style="background-color:white;" autocomplete="off">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input name="room" class="forminput form-control text-uppercase" type="text" id="room" placeholder=" " style="background-color:white;" autocomplete="off">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input name="effectivity_date" class="forminput form-control" type="date" id="effectivity_date" placeholder=" " style="background-color:white;">
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input name="expiration_date" class="forminput form-control" type="date" id="expiration_date" placeholder=" " style="background-color:white;">
                        </div>
                    </td>
                    <td class="pb-3 pt-3"></td>
                    <td class="pb-3 pt-3">
                        <button type="button" id="hmoAdd" class="btn btn-success center" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
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

        // var table = $('#hmoTable').DataTable({
        //     scrollY:        "484px",
        //     scrollX:        true,
        //     scrollCollapse: true,
        //     fixedColumns:{
        //         left: 2,
        //     },
        //     dom: 't',
        //     ajax: {
        //         url: '/rowspan_data',
        //         data:{
        //             id: 550
        //         }
        //     },
        //     columnDefs: [
        //         {
        //             "render": function(data, type, row, meta){
        //                 return `
        //                         <button type="button" class="btn btn-primary center btnEditHmo"
        //                             hmo_id=${row.id}
        //                             hmo_name=${row.hmo}
        //                             hmo_coverage=${row.coverage}
        //                             hmo_particulars=${row.particulars}
        //                             hmo_room=${row.room}
        //                             hmo_effectivity_date=${row.effectivity_date}
        //                             hmo_expiration_date=${row.expiration_date}
        //                             hmo_status=${row.status}>
        //                             <i class="fa-solid fa-pen-to-square"></i>
        //                         </button>
        //                         `;
        //             },
        //             "defaultContent": '',
        //             "data": null,
        //             "targets": [7],
        //         }
        //     ],
        //     columns: [
        //         { data: 'hmo'},
        //         { data: 'coverage'},
        //         {
        //         data: 'particulars',
        //             "render":function(data,type,row){
        //                 return(`<div style="white-space: normal; width: 15vw;"><span>${data}</span></div>`);
        //             }
        //         },
        //         { data: 'room'},
        //         { data: 'effectivity_date'},
        //         { data: 'expiration_date'},
        //         { data: 'status'}
        //     ]
        // });
    });

    $('#hmoAdd').on('click', function(){
        var first_rowspan = parseInt($(this).closest('tr').find('td:first').attr('rowspan')) || 1;
        first_rowspan++;
        $(this).closest('tr').find('td:first').attr('rowspan', first_rowspan);
        var second_rowspan = parseInt($(this).closest('tr').find('td:last-child').attr('rowspan')) || 1;
        second_rowspan++;
        $(this).closest('tr').find('td:last-child').attr('rowspan', second_rowspan);
        var third_rowspan = parseInt($(this).closest('tr').find('td:nth-last-child(2)').attr('rowspan')) || 1;
        third_rowspan++;
        $(this).closest('tr').find('td:nth-last-child(2)').attr('rowspan', third_rowspan);
        $(this).closest('tr').find('td:nth-last-child(2)').text('ACTIVE');
        var newRow = `
                <tr class="tr_hmo">
                    <input name="hmo" type="hidden" value="${$('#hmo').val()}">
                    <td>
                        <input name="coverage" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off">
                    </td>
                    <td>
                        <input name="particulars" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;" autocomplete="off">
                    </td>
                    <td>
                        <input name="room" class="forminput form-control text-uppercase" type="search" placeholder=" " style="background-color:white;">
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
            $.ajax({
                type: 'POST',
                url: '/rowspan_save',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    employee_id      : 550,
                    hmo              : $(this).find('input[name="hmo"]').val(),
                    coverage         : $(this).find('input[name="coverage"]').val(),
                    particulars      : $(this).find('input[name="particulars"]').val(),
                    room             : $(this).find('input[name="room"]').val(),
                    effectivity_date : $(this).find('input[name="effectivity_date"]').val(),
                    expiration_date  : $(this).find('input[name="expiration_date"]').val()
                },
                success:function(response){
                }
            });
        });
    });
</script>
</body>
</html>

