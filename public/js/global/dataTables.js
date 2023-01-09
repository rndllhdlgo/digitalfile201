
var employeesTable;
$(document).ready(function(){
    employeesTable = $('table.employeesTable').DataTable({
        dom:'l<"breakspace">trip',
        language:{
            info: "\"Showing _START_ to _END_ of _TOTAL_ Employees\"",
            lengthMenu:"Show _MENU_ Employees",
            emptyTable:"No Employees Data Found!",
            loadingRecords: "Loading Employee Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax:{
            url: '/employees/listOfEmployees',
        },
        order: [],
        columns:[
            {data: 'employee_number'},//data column name
            {data: 'first_name'},
            {data: 'middle_name'},
            {data: 'last_name'},
            {data: 'employee_position'},
            {data: 'employee_branch'},
            {data: 'employment_status'},
        ],
        initComplete: function(){
            $('#loading').hide();
        }
    });
});

$('.filter-input').on('keyup search', function(){
    employeesTable.column($(this).data('column')).search($(this).val()).draw();
});

var usersTable;
$(document).ready(function(){
    usersTable = $('table.usersTable').DataTable({
        dom:'l<"breakspace">trip',
        language:{
            "info": "\"_START_ to _END_ of _TOTAL_ Users\"",
            "lengthMenu":"Show _MENU_ Users",
            "emptyTable":"No Users Data Found!",
            "loadingRecords": "Loading Users Records...",
        },
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax:{
            url: '/users/listOfUsers',
        },
        order: [],
        columns:[
            {data: 'user_level'},//data column name
            {data: 'name'},
            {data: 'email'},
            {data: 'status'},
        ],
        initComplete: function(){
            $('#loading').hide();
            $('#status_filter').val('');
        }
    });
    $('div.breakspace').html('<br><br>');
});

$('.filter-input').on('keyup search', function(){
    usersTable.column($(this).data('column')).search($(this).val()).draw();
});

// var employee_logs_table;
// $(document).ready(function(){
//     employee_logs_table = $('table.employee_logs_table').DataTable({
//         dom:'l<"breakspace">trip',
//         language:{
//             "info": "\"_START_ to _END_ of _TOTAL_ Employee Logs\"",
//             "lengthMenu":"Show _MENU_ Employee Logs",
//             "emptyTable":"No Employee Logs Data Found!",
//             "loadingRecords": "Loading Employee Logs Records...",
//         },
//         "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//         processing:true,
//         serverSide:false,
//         ajax:{
//             url: '/employees/employee_logs',
//         },
//         order: [],
//         columns:[
//             {data: 'logs'},
//         ],
//         initComplete: function(){
//             $('#loading').hide();
//         }
//     });
//     $('div.breakspace').html('<br><br>');
// });

// $('.filter-input').on('keyup search', function(){
//     employee_logs_table.column($(this).data('column')).search($(this).val()).draw();
// });

// //Display Data Table Function
// var employeesTable;
// $(document).ready(function () {
//     // Setup - add a text input to each footer cell
//     $('#employeesTable thead tr')
//         .clone(true)
//         .addClass('filters')
//         .appendTo('#employeesTable thead');

//         employeesTable = $('#employeesTable').DataTable({
//             dom:'l<"breakspace">trip',
//             language:{
//                 "info": "\"Showing _START_ to _END_ of _TOTAL_ Employees\"",
//                 "lengthMenu":"Show _MENU_ Employees",
//                 "emptyTable":"No Employees Data Found!",
//                 "loadingRecords": "Loading Employee Records...",
//             },
//             "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//             processing:true,
//             serverSide:false,
//             orderCellsTop: true,
//             fixedHeader: true,
//             ajax:{
//                 url: '/employees/listOfEmployees',
//             },
//             order: [],
//             columns:[
//                 {data: 'employee_number'},//data column name
//                 {data: 'first_name'},
//                 {data: 'middle_name'},
//                 {data: 'last_name'},
//                 {data: 'employee_position'},
//                 {data: 'employee_branch'},
//                 {data: 'employee_status'},
//             ],
//             initComplete: function () {
//                 var api = this.api();
    
//                 // For each column
//                 api
//                     .columns()
//                     .eq(0)
//                     .each(function (colIdx) {
//                         // Set the header cell to contain the input element
//                         var cell = $('.filters th').eq(
//                             $(api.column(colIdx).header()).index()
//                         );
//                         var title = $(cell).text();
//                         $(cell).html('<input type="text" class="text-capitalize" style="border:none;border-radius:5px;width:100%;"/>');
    
//                         // On every keypress in this input
//                         $(
//                             'input',
//                             $('.filters th').eq($(api.column(colIdx).header()).index())
//                         )
//                             .off('keyup change')
//                             .on('change', function (e) {
//                                 // Get the search value
//                                 $(this).attr('title', $(this).val());
//                                 var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
//                                 var cursorPosition = this.selectionStart;
//                                 // Search the column for that value
//                                 api
//                                     .column(colIdx)
//                                     .search(
//                                         this.value != ''
//                                             ? regexr.replace('{search}', '(((' + this.value + ')))')
//                                             : '',
//                                         this.value != '',
//                                         this.value == ''
//                                     )
//                                     .draw();
//                             })
//                             .on('keyup', function (e) {
//                                 e.stopPropagation();
    
//                                 $(this).trigger('change');
//                                 $(this)
//                                     .focus()[0]
//                                     .setSelectionRange(cursorPosition, cursorPosition);
//                             });
//                     });
//             },
//         });
//     $('span.breakspace').html('<br><br>');
// });

//Users DataTable
// var usersTable;
// $(document).ready(function () {
//     // Setup - add a text input to each footer cell
//     $('#usersTable thead tr')
//         .clone(true)
//         .addClass('filters')
//         .appendTo('#usersTable thead');

//         usersTable = $('#usersTable').DataTable({
//         dom:'l<"breakspace">trip',
//         language:{
//             "info": "\"_START_ to _END_ of _TOTAL_ Users\"",
//             "lengthMenu":"Show _MENU_ Users",
//             "emptyTable":"No Users Data Found!",
//             "loadingRecords": "Loading Users Records...",
//         },
//         "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//         processing:true,
//         serverSide:false,
//         orderCellsTop: true,
//         fixedHeader: true,
//         ajax:{
//             url: '/users/listOfUsers',
//         },
//         order: [],
//         columns:[
//             {data: 'user_level'},//data column name
//             {data: 'name'},
//             {data: 'email'},
//             {data: 'status'},
//         ],
//         initComplete: function () {
//             var api = this.api();
 
//             // For each column
//             api
//                 .columns()
//                 .eq(0)
//                 .each(function (colIdx) {
//                     // Set the header cell to contain the input element
//                     var cell = $('.filters th').eq(
//                         $(api.column(colIdx).header()).index()
//                     );
//                     var title = $(cell).text();
//                     $(cell).html('<input type="text" class="text-capitalize" style="border:none;border-radius:5px;width:100%;"/>');
 
//                     // On every keypress in this input
//                     $(
//                         'input',
//                         $('.filters th').eq($(api.column(colIdx).header()).index())
//                     )
//                         .off('keyup change')
//                         .on('change', function (e) {
//                             // Get the search value
//                             $(this).attr('title', $(this).val());
//                             var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
//                             var cursorPosition = this.selectionStart;
//                             // Search the column for that value
//                             api
//                                 .column(colIdx)
//                                 .search(
//                                     this.value != ''
//                                         ? regexr.replace('{search}', '(((' + this.value + ')))')
//                                         : '',
//                                     this.value != '',
//                                     this.value == ''
//                                 )
//                                 .draw();
//                         })
//                         .on('keyup', function (e) {
//                             e.stopPropagation();
 
//                             $(this).trigger('change');
//                             $(this)
//                                 .focus()[0]
//                                 .setSelectionRange(cursorPosition, cursorPosition);
//                         });
//                 });
//         },
//     });
//     $('div.breakspace').html('<br><br>');
// });
