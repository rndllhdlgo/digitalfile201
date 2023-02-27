$('.logs_table_data tbody').on('click', 'tr', function(){
    var data =  $('.logs_table_data').DataTable().row(this).data();
    Swal.fire({
        title: `<h5>` + moment(data.date).format('dddd, MMMM DD, YYYY, h:mm:ss A') + `</h5>`,
        html: `<h4 style="color:#0d1a80 !important;">` + data.username + ` [` + data.user_level + `]` + `</h4>` + `<br>` + `<ol style="text-align: left !important;font-weight:600 !important;">` +  data.logs.replaceAll(" [","<li>[") + `</li></ol>`,
        width: 850,
    });
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