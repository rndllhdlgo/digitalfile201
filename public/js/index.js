var table = $('table.user_activity_table').DataTable({
    language:{
        processing: "Loading...",
        emptyTable: "No data available in table"
    },
    serverSide: true,
    ajax:{
        url: '/index/data',
    },
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
        { data: 'activity' }
    ],
    order: [],
    initComplete: function(){
        $('#loading').hide();
    }
});