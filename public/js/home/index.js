var user_activity_table;
$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#user_activity_table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#user_activity_table thead');

        user_activity_table = $('#user_activity_table').DataTable({
            dom:'l<"breakspace">trip',
            language:{
                "info": "\"_START_ to _END_ of _TOTAL_ User Logs\"",
                "lengthMenu":"Show _MENU_ User Logs",
                "emptyTable":"No User Logs Data Found!",
                "loadingRecords": "Loading User Logs Records...",
            },
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            processing:true,
            serverSide:false,
            orderCellsTop: true,
            fixedHeader: true,
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
                        // return moment(row.date).format('MMM. DD, YYYY, h:mm A');

                    }
                },
                { data: 'username' },
                { data: 'role' },
                { data: 'activity' }
            ],
            initComplete: function () {
                var api = this.api();
    
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" class="text-capitalize" style="border:none;border-radius:5px;width:100%;"/>');
    
                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();
    
                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    $('div.breakspace').html('<br><br>');
});

//Display current date and time
const d = new Date().toDateString();
const t = new Date().toLocaleTimeString();
document.getElementById("date").innerHTML = d + ' ' + t;

