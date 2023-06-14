var employeesTable,employee_image_change;
$(document).ready(function(){
    if(current_location == '/employees?employment_status=probationary'){
        $('#head_title').html('- PROBATIONARY');
        var targets = [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
        var filter = 'probationary';
    }
    else if(current_location == '/employees?employment_status=regular'){
        $('#head_title').html('- REGULAR');
        var targets = [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
        var filter = 'regular';
    }
    else if(current_location == '/employees?employment_status=agency'){
        $('#head_title').html('- AGENCY');
        var targets = [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
        var filter = 'agency';
    }
    else if(current_location == '/employees?status=active'){
        $('#head_title').html('- ACTIVE EMPLOYEES');
        var targets = [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
        var filter = 'active';
    }
    else if(current_location == '/employees?status=inactive'){
        $('#head_title').html('- INACTIVE EMPLOYEES');
        var targets = [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
        var filter = 'inactive';
    }
    else if(current_location == '/employees?employment_status=male'){
        $('#head_title').html('- MALE');
        var targets = [5,6,7,8,9,10,12,13,14,15,16,17,18,19];
        var filter = 'male';
    }
    else if(current_location == '/employees?employment_status=female'){
        $('#head_title').html('- FEMALE');
        var targets = [5,6,7,8,9,10,12,13,14,15,16,17,18,19];
        var filter = 'female';
    }
    else{
        var targets = [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
    }

    // if(window.location.search.includes('employee_number') == true){
    //     var aLengthMenu = [[-1, 10, 25, 50], ["All", 10, 25, 50]];
    // }
    // else{
    //     var aLengthMenu = [[10, 25, 50, -1], [10, 25, 50, "All"]];
    // }
    // var iLength = current_user_level == 'EMPLOYEE' ? -1 : 10;

    employeesTable = $('table.employeesTable').DataTable({
        scrollY:        "484px",
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:{
            left: 2,
        },
        dom:'lf<"breakspace">trip',
        language:{
            info: "\"Showing _START_ to _END_ of _TOTAL_ Employees\"",
            lengthMenu:"Show _MENU_ Employees",
            emptyTable:"No Employees Data Found!",
            loadingRecords: "Loading Employee Records...",
        },
        // aLengthMenu: aLengthMenu,
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        // iDisplayLength: iLength,
        processing:true,
        serverSide:false,
        autoWidth:false,
        ajax: {
            url: '/employees/data',
            data:{
                filter:filter
            },
        },
        order:[],
        columnDefs: [
            {
                "targets": targets,
                "visible": false,
                "searchable": true
            },
            {
                targets: '_all',
                render: function(data, type, row, meta){
                    if (data == null) {
                        return '';
                    }
                    if (typeof data === 'string') {
                        return data.toUpperCase();
                    }
                    return data;
                }
            },
        ],
        columns:[
            {
                data: 'employee_number',
                "render": function(data, type, row){
                    if(row.employee_number == null || row.employee_number == ''){
                        return '';
                    }
                    return "<span class="+row.employee_number+">"+row.employee_number+"</span>";
                }
            },
            {
                data: null,
                "render": function(data,type,row){
                    return (row.last_name + ', ' + row.first_name + ' ' + row.middle_name).toUpperCase();
                }
            },
            {data: 'employee_position'},
            {data: 'employee_branch'},
            {data: 'employment_status'},
            {data: 'employee_company'},
            {data: 'employee_department'},
            {
                data: 'date_hired',
                "render":function(data,type,row){
                    if(row.date_hired){
                        return formatDate(row.date_hired);
                    }
                    return '';
                }
            },
            {
                data: 'email_address',
                "render": function(data,type,row){
                    if(row.email_address){
                        return (row.email_address).toLowerCase();
                    }
                    return '';
                }
            },
            {data: 'cellphone_number'},
            {data: 'telephone_number'},
            {data: 'gender'},
            {data: 'civil_status'},
            {
                data: 'birthday',
                "render":function(data,type,row){
                    if(row.birthday){
                        return formatDate(row.birthday);
                    }
                    return '';
                }
            },
            {
                data: null,
                "render":function(data,type,row){
                    if(row.birthday){
                        var today = new Date();
                        var birthDate = new Date(row.birthday);
                        var age = today.getFullYear() - birthDate.getFullYear();
                        var m = today.getMonth() - birthDate.getMonth();
                        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }
                        return age;
                    }
                    return '';
                }
            },
            {data: 'province'},
            {data: 'city'},
            {data: 'region'},
            {data: 'blood_type'},
            {data: 'religion'},
            {
                data: 'stat',
                "render": function(data, type, row){
                    if(row.stat == '1'){
                        return "FOR COMPLETION";
                    }
                    else{
                        return '';
                    }
                }
            }
        ],
        initComplete: function(){
            // if(window.location.search.includes('employee_number') == true){
            //     var url = new URL(window.location.href);
            //     var employee_number = url.searchParams.get("employee_number");
            //     $('.'+employee_number).closest('tr').click();
            // }
            // else{
            //     $('#employees_list').show();
            //     $('#filter1').keyup();
            //     $('#loading').hide();
            // }

            if(current_user_level == 'EMPLOYEE'){
                $.ajax({
                    url: "/employees/status",
                    success: function(data){
                        if(data == 'PENDING'){
                            $('#loading').hide();
                            Swal.fire({
                                title: "PENDING UPDATE",
                                html: '<div style="font-family: Century Gothic, cursive;">You have a pending update. Please contact HR for the status of your request update.</div>',
                                icon: "warning",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'LOGOUT'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/logout';
                                }
                            });
                        }
                        else{
                            $('.'+current_employee_number).closest('tr').click();
                        }
                    }
                });
            }
            else{
                $('#employees_list').show();
                $('#filter1').keyup();
                $('#loading').hide();
            }
        }
    });

    $('div.breakspace').html('<br><br>');

    $('body').on('click', '.checkboxFilter', function(){
        var column = employeesTable.column($(this).attr('data-column'));
        var colnum = $(this).attr('data-column');
        column.visible(!column.visible());
        $('.fl-'+colnum).val('');
        employeesTable.column(colnum).search('').draw();
    });

    setInterval(() => {
        if($('.popover-header').is(':visible')){
            for(var i=0; i<=19; i++){
                if(employeesTable.column(i).visible()){
                    $('#filter-'+i).prop('checked', true);
                }
                else{
                    $('#filter-'+i).prop('checked', false);
                }
            }
        }
        $('th input').on('click', function(e){
            e.stopPropagation();
        });
    }, 0);

    $('#filter').popover({
        html: true,
        sanitize: false
    });

    $('html').on('click', function(e){
        $('#filter').each(function(){
            if(!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0){
                $('#filter').popover('hide');
            }
        });
    });
});

$('.filter-input').on('keyup search', function(){
    employeesTable.column($(this).data('column')).search($(this).val()).draw();
});

$('#addEmployeeBtn').on('click',function(){
    $('#employee_information').fadeIn();
    $('#employees_list').hide();
    $('#addEmployeeBtn').hide();
    $('#btnUpdate').hide();
    $('#btnSummary').hide();
    $('#navigation').show();
    $('#tab1').addClass('tabactive');
    $('#spouse_contact_number').val('');

    $('#employee_company').chosen();
    $('#employee_company_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employee_branch').chosen();
    $('#employee_branch_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employee_department').chosen();
    $('#employee_department_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employee_position').chosen();
    $('#employee_position_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employment_status').chosen();
    $('#employment_status_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employment_origin').chosen();
    $('#employment_origin_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });
});

setInterval(() => {
    if(!$('#employee_shift').val()){
        $('#employee_shift_chosen').addClass('required_field');
        $('#employee_shift').addClass('required_field');
    }
    else{
        $('#employee_shift_chosen').removeClass('required_field border border-danger');
        $('#employee_shift').removeClass('required_field');
    }

    if(!$('#employee_company').val()){
        $('#employee_company_chosen').addClass('required_field');
        $('#employee_company').addClass('required_field');
    }
    else{
        $('#employee_company_chosen').removeClass('required_field border border-danger');
        $('#employee_company').removeClass('required_field');
    }

    if(!$('#employee_branch').val()){
        $('#employee_branch_chosen').addClass('required_field');
        $('#employee_branch').addClass('required_field');
    }
    else{
        $('#employee_branch_chosen').removeClass('required_field border border-danger');
        $('#employee_branch').removeClass('required_field');
    }

    if(!$('#employee_department').val()){
        $('#employee_department_chosen').addClass('required_field');
        $('#employee_department').addClass('required_field');
    }
    else{
        $('#employee_department_chosen').removeClass('required_field border border-danger');
        $('#employee_department').removeClass('required_field');
    }

    if(!$('#employee_position').val()){
        $('#employee_position_chosen').addClass('required_field');
        $('#employee_position').addClass('required_field');
    }
    else{
        $('#employee_position_chosen').removeClass('required_field border border-danger');
        $('#employee_position').removeClass('required_field');
    }

    if(!$('#employment_status').val()){
        $('#employment_status_chosen').addClass('required_field');
        $('#employment_status').addClass('required_field');
    }
    else{
        $('#employment_status_chosen').removeClass('required_field border border-danger');
        $('#employment_status').removeClass('required_field');
    }

    if(!$('#employment_origin').val()){
        $('#employment_origin_chosen').addClass('required_field');
        $('#employment_origin').addClass('required_field');
    }
    else{
        $('#employment_origin_chosen').removeClass('required_field border border-danger');
        $('#employment_origin').removeClass('required_field');
    }
}, 0);

function changeCivilStatus(){
    var status = $('#civil_status');
    if($('#civil_status').val() == "MARRIED"){
        $('#spouse').show();
        $('#spouse_name').addClass('required_field');
        $('.children_information').hide();
        $('#children_table').hide();

        $('#spouse_summary_div').show();
    }
    else if($('#civil_status').val() == "SOLO PARENT"){
        $('#spouse').hide();
        $('.children_information').show();
        $('#spouse_name').val("");
        $('#spouse_contact_number').val("");
        $('#spouse_profession').val("");

        $('#spouse_summary_div').hide();
    }
    else{
        $('.children_information').hide();
        $('#spouse').hide();
        $('#spouse_name').removeClass('required_field');
        $('#spouse_profession').removeClass('required_field');
    }
}

function changeEmploymentStatus(){
    var employment_status = $('#employment_status');

    if($('#employment_status').val() == "REGULAR"
    || $('#employment_status').val() == 'PROBATIONARY'
    || $('#employment_status').val() == 'PART TIME'
    || $('#employment_status').val() == 'RETIRED'
    ){
        $('#benefits').show();
        $('#benefits_summary').show();
        $('#resignation_div').hide();
        $('#termination_div').hide();
    }
    else if($('#employment_status').val() == 'RESIGNED'){
            $('#resignation_div').show();
            $('.hr-resignation').show();
            $('#termination_div').hide();
            $('#benefits').hide();
            $('#benefits_summary').hide();

    }
    else if($('#employment_status').val() == 'TERMINATED'){
            $('#termination_div').show();
            $('.hr-termination').show();
            $('#resignation_div').hide();
            $('#benefits').hide();
            $('#benefits_summary').hide();
    }
    else{
        $('#resignation_div').hide();
        $('#termination_div').hide();

        $('#benefits').hide();
        $('#benefits_summary').hide();
    }
}

$('#birthday').on('change',function(){
    var today = new Date();
    var birthDate = new Date($('#birthday').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    return $('#age').val(age);
});

$('.birthday').on('change',function(){
    var today = new Date();
    var birthDate = new Date($('.birthday').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    return $('.age').html(age);
});

$('#child_birthday').on('change',function(){
    var today = new Date();
    var birthDate = new Date($('#child_birthday').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    return $('#child_age').val(age);
});

$(document).on('click','#image_close, #image_close_trash',function(){
    Swal.fire({
        title: 'Do you want to remove image?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if(save.isConfirmed){
            var img_delete = $('#filename').val();
            $.ajax({
                url:"/upload_picture",
                type:"get",
                async: false,
                success:function(image_upload_div){
                    $('.column1').html(image_upload_div);
                }
            });

            $('#filename_delete').val(img_delete);
            $('#filename').val('');

            employee_image_change = 'CHANGED';
        }
    });
});

$(document).on('change', '#province', function(){
    if($(this).val()){
        var citiesOption = " ";
        $.ajax({
            url:"/getCities",
            type:"get",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                provCode:$(this).val(),
            },
            success:function(data){
                var cities = $.map(data, function(value, index) {
                    return [value];
                });
                citiesOption+='<option selected disabled>SELECT CITY/MUNICIPALITY</option>';
                cities.forEach(value => {
                    citiesOption+='<option class="city" value="'+value.citymunCode+'">'+value.citymunDesc+'</option>';
                });
                $("#city").find('option').remove().end().append(citiesOption);
            }
        });
        $("#city").prop('disabled', false);
    }
});

$(document).on('change', '#city', function(){
    if($(this).val()){
        var RegionOption = " ";
        $.ajax({
            url:"/getRegion",
            type:"get",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                citymunCode:$(this).val(),
            },
            success:function(data){
                $('#region').val(data[0].regDesc);
            }
        });
    }
});

$('#viewJobDescriptionBtn').on('click',function(){
    $('ul.job_description_div').empty();
    $('ul.job_requirements_div').empty();
    $('#jobDescriptionModalTitle').empty();

    $.ajax({
        type: 'GET',
        url: '/setJobDescription',
        data:{
            id: $('#employee_position').val()
        },
        success: function(data){
            var job_description = data[0].job_description;
            var job_requirements = data[0].job_requirements;
            var job_description_details = job_description.split('•');
            var job_requirements_details = job_requirements.split('•');
            for(var i=0; i < job_description_details.length; i++){
                if(job_description_details[i]){
                    $('.job_description_div').append('<li>' + job_description_details[i] + '</li>');
                }
            }
            for(var j=0; j < job_requirements_details.length; j++){
                if(job_requirements_details[j]){
                    $('.job_requirements_div').append('<li>' + job_requirements_details[j] + '</li>');
                }
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: '/setJobPosition',
        data:{
            id: $('#employee_position').val()
        },
        success: function(data){
            var list = $.map(data, function(value, index){
                return [value];
            });
            list.forEach(value => {
                $('#jobDescriptionModalTitle').append(value.job_position_name);
            });
        }
    });
    $('#viewJobDescriptionModal').modal({
        backdrop: 'static',
        keyboard: false
    });

    $('#viewJobDescriptionModal').modal('show');
});

$(document).ready(function() {
    var cellphone_number = $('#cellphone_number');
    var emergency_contact_number = $('#emergency_contact_number');

    $("#cellphone_number, #emergency_contact_number").on("keyup", function(){
        if(cellphone_number.val() === emergency_contact_number.val()){
            $('#same_value').show();
        }
        else{
            $('#same_value').hide();
        }
    });
});

$('.employee_history_table tbody').on('click', 'tr', function(){
    var data =  $('.employee_history_table').DataTable().row(this).data();
    Swal.fire({
        title: `<h5>` + moment(data.date).format('dddd, MMMM DD, YYYY, h:mm:ss A') + `</h5>`,
        html: `<ol style="text-align: left !important;font-weight:600 !important;">` +  data.history.replaceAll(" [","<li>[") + `</li></ol>`,
        width: 850,
    });
});

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

// Region,Province,City DropDown Function
// $('#region').on('change', function(){
//     $('#province').val('');
//     $('#city').val('');
//     $('#city').find('option').remove().end()
//     $('#city').append($('<option value="" selected disabled>SELECT CITY</option>'));
//     $.ajax({
//         type: 'GET',
//         url: '/setprovince',
//         data:{
//             'regCode': $('#region').val()
//         },
//         success: function(data){
//             $('#province').find('option').remove().end()
//             $('#province').append($('<option value="" selected disabled>SELECT PROVINCE</option>'));
//             var list = $.map(data, function(value, index){
//                 return [value];
//             });
//             list.forEach(value => {
//                 $('#province').append($('<option>', {
//                     value: value.provCode,
//                     text: value.provDesc.toUpperCase(),
//                     class:'province'
//                 }));
//             });
//         }
//     });
// });

// $('#province').on('change', function(){
//     $('#city').val('');
//     $.ajax({
//         type: 'GET',
//         url: '/setcity',
//         data:{
//             'provCode': $('#province').val()
//         },
//         success: function(data){
//             $('#city').find('option').remove().end()
//             $('#city').append($('<option value="" selected disabled>SELECT CITY</option>'));
//             var list = $.map(data, function(value, index){
//                 return [value];
//             });
//             list.forEach(value => {
//                 $('#city').append($('<option>', {
//                     value: value.citymunCode,
//                     text: value.citymunDesc.toUpperCase(),
//                     class:'city'
//                 }));
//             });
//         }
//     });
// });

// setInterval(() => {
//     if($('.required_field').filter(function(){ return !!this.value; }).length < $(".required_field").length)
//     {
//         $('#btnSave').prop("disabled",true);
//     }
//     else{
//         $('#btnSave').prop("disabled",false);
//     }
// }, 0);

// setInterval(() => {
//     if($('.required_field').filter(function(){ return !!this.value; }).length < $(".required_field").length){
//         $('#btnUpdate').prop("disabled",true);

//     }
//     else{
//         $('#btnUpdate').prop("disabled",false);
//     }
// }, 0);

// setInterval(() => {
//     if($('#btnSave').is(":visible")){
//         $('#employee_history_div').hide();
//         $('#resign').hide();
//         $('#terminate').hide();
//         $('#retired').hide();
//     }
//     else{
//         $('#employee_history_div').show();
//         $('#resign').show();
//         $('#terminate').show();
//         $('#retired').show();
//     }
// }, 0);

// setInterval(() => {
//     if($('#btnSave').is(":visible")){
//         $('#tab9').hide();
//     }
//     else{
//         $('#tab9').show();
//     }
// }, 0);

// $(document).on('change' ,'#select_all', function() {
//     var isChecked = $(this).prop('checked');
//     $('.checkboxFilter').prop('checked', isChecked);
// });
