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
                width: '15%',
                "render": function(data, type, row){
                    return "<span class='d-none'>"+row.date+"</span>"+moment(row.date).format('MMM. DD, YYYY, h:mm A');
                }
            },
            { data: 'username',width: '15%',},
            { data: 'role' ,width: '15%',},
            {
                data: 'activity',
                width: '55%',
                "render":function(data,type,row){
                    activity = row.activity.replaceAll(" [","<br>[").replaceAll(" (","<br>(");
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

    $('.filter-select').on('change', function(){
        user_activity_table.column($(this).data('column')).search(!$(this).val()?'':'^'+$(this).val()+'$',true,false,true).draw();
    });

    setInterval(function(){
        if($('#loading').is(':hidden') && standby == false){
            $.ajax({
                url: "/index_reload_data",
                success: function(data){
                    if(data != data_update){
                        data_update = data;
                        $('.employeesTable').DataTable().ajax.reload(null, false);
                    }
                }
            });
        }
    }, 1000);

    $('#user_activity_table tbody').on('click', 'tr', function(){
        var data = user_activity_table.row(this).data();
        Swal.fire({
            title: `<h5>` + moment(data.date).format('dddd, MMMM DD, YYYY, h:mm:ss A') + `</h5>`,
            html: `<h4>` + data.username + ` [`+ data.role +`] ` + `</h4>` + `<br>` + `<ol style="text-align: left !important;font-weight:600 !important;">` +  data.activity.replaceAll(" [","<li>[").replaceAll(" (","<br>(") + `</li></ol>`,
            width: 850,
        });
    });
});