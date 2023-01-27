// var user_activity_table;
// $(document).ready(function () {
//     $('#user_activity_table thead tr')
//         .clone(true)
//         .addClass('filters')
//         .appendTo('#user_activity_table thead');

//         user_activity_table = $('#user_activity_table').DataTable({
//             dom:'l<"breakspace">trip',
//             language:{
//                 "info": "\"_START_ to _END_ of _TOTAL_ User Logs\"",
//                 "lengthMenu":"Show _MENU_ User Logs",
//                 "emptyTable":"No User Logs Data Found!",
//                 "loadingRecords": "Loading User Logs Records...",
//             },
//             "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//             processing:true,
//             serverSide:false,
//             orderCellsTop: true,
//             fixedHeader: true,
//             ajax:{
//                 url: '/index/data',
//             },
//             order: [],
//             columnDefs: [
//                 {
//                     "targets": [0],
//                     "visible": false,
//                     "searchable": true
//                 },
//             ],
//             columns: [
//                 { data: 'datetime' },
//                 {
//                     data: 'date',
//                     "render": function(data, type, row){
//                         return "<span class='d-none'>"+row.date+"</span>"+moment(row.date).format('MMM. DD, YYYY, h:mm A');
//                     }
//                 },
//                 { data: 'username' },
//                 { data: 'role' },
//                 { data: 'activity' }
//             ],
//             initComplete: function () {
//                 var api = this.api();
//                     api
//                     .columns()
//                     .eq(0)
//                     .each(function (colIdx) {
//                         var cell = $('.filters th').eq(
//                             $(api.column(colIdx).header()).index()
//                         );
//                         var title = $(cell).text();
//                         $(cell).html('<input type="text" class="text-capitalize" style="border:none;border-radius:5px;width:100%;"/>');
    
//                         $(
//                             'input',
//                             $('.filters th').eq($(api.column(colIdx).header()).index())
//                         )
//                             .off('keyup change')
//                             .on('change', function (e) {
//                                 $(this).attr('title', $(this).val());
//                                 var regexr = '({search})';
    
//                                 var cursorPosition = this.selectionStart;
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
//     $('div.breakspace').html('<br><br>');
// });


var user_activity_table;
$(document).ready(function(){
    user_activity_table = $('table.user_activity_table').DataTable({
        dom:'l<"breakspace">trip',
        language:{
            info: "\"Showing _START_ to _END_ of _TOTAL_ User Activities\"",
            lengthMenu:"Show _MENU_ User Activities",
            emptyTable:"No User Activities Data Found!",
            loadingRecords: "Loading User Activities Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax:{
            url: '/index/data',
        },
        order: [],
        columnDefs: [
            {
                "targets": [0],
                "visible": false,
                "searchable": true
            },
        ],
        columns: [
            { data: 'datetime' },
            {
                data: 'date',
                "render": function(data, type, row){
                    return "<span class='d-none'>"+row.date+"</span>"+moment(row.date).format('MMM. DD, YYYY, h:mm A');
                }
            },
            { data: 'username' },
            { data: 'role' },
            { 
                data: 'activity',
                "render":function(data,type,row){
                    activity = row.activity.replaceAll(" [","<br>[");
                    return activity;
                },
            }
        ],
        initComplete: function(){
            $('#loading').hide();
        }
    });
    $('div.breakspace').html('<br><br>');

    $('.filter-input').on('keyup search', function(){
        user_activity_table.column($(this).data('column')).search($(this).val()).draw();
    });

    $('#user_activity_table tbody').on('click', 'tr', function(){
        var data = user_activity_table.row(this).data();
        Swal.fire({
            title: `<h5>` + moment(data.date).format('dddd, MMMM DD, YYYY, h:mm:ss A') + `</h5>`,
            html: `<h4>` + data.username + `[`+ data.role +`]` + `</h4>` + `<br>` + `<b>` +  data.activity.replaceAll(" [","<br>[") + `</b>`,
        })
        // Swal.fire({
        //     title: `<h5>` + moment(data.date).format('dddd, MMMM DD, YYYY, h:mm:ss A') + `</h5>`,
        //     html: `<h4>` + data.username + ` [` + data.role + `]` + `</h4>` + `<br>` + `<b>` +  data.activity.replaceAll(" [","<br>[") + `</br>`,
        //     icon: 'info',
        //     customClass: 'swal-wide',
        //     showCancelButton: true,
        //     confirmButtonText: 'VIEW DETAILS',
        //     cancelButtonText: 'BACK'
        // })
        // .then((result) => {
        //     if(result.isConfirmed){
        //         // var transaction_number = activity.substr(-15,14);
        //         window.location.href = '/employees?employee_number=';
        //     }
        // });
    });
});