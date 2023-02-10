$('.employee_history_table tbody').on('click', 'tr', function(){
    var data =  $('.employee_history_table').DataTable().row(this).data();
    Swal.fire({
        title: `<h5>` + moment(data.date).format('dddd, MMMM DD, YYYY, h:mm:ss A') + `</h5>`,
        // html: `<h4 style="color:#0d1a80 !important;">` + data.username + `[` + data.user_level + `]` + `</h4>` + `<br>` + `<h6>` + data.logs.replaceAll(" [","<br>[") + `</h6>`,
        // html: `<h6 style="text-align: left !important;">` + data.history.replaceAll(" [","<br>[") + `</h6>`,
        html: `<ol style="text-align: left !important;font-weight:600 !important;">` +  data.history.replaceAll(" [","<li>[") + `</li></ol>`,
        width: 850,
    });
});