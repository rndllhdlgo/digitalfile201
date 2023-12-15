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

    employeesTable = $('table.employeesTable').DataTable({
        scrollY:        "484px",
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:{
            left: 2,
        },
        dom: 'lftrip',
        language:{
            info: "\"Showing _START_ to _END_ of _TOTAL_ Employees\"",
            lengthMenu:"Show _MENU_ Employees",
            emptyTable:"No Employees Data Found!",
            loadingRecords: "Loading Employee Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        autoWidth:false,
        ajax: {
            url: '/employees/data',
            data:{
                filter:filter
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    Swal.fire({
                        title: 'DATA PROBLEM!',
                        html: '<h4>Data does not load properly.<br>Please refresh the page, or if it keeps happening, contact the <b>ADMINISTRATOR</b>.</h4>',
                        confirmButtonText: "REFRESH",
                        icon: 'error',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        width: 700
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.reload();
                        }
                    });
                }
            }
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
                data: 'work_information.employee_number',
                render: function(data, type, row, meta){
                    if(data){
                        if(row.work_information.company.entity == '001'){
                            return 'ID'+row.work_information.employee_number.toUpperCase();
                        }
                        else if(row.work_information.company.entity == '002'){
                            return 'PL'+row.work_information.employee_number.toUpperCase();
                        }
                        else if(row.work_information.company.entity == '003'){
                            return 'AP'+row.work_information.employee_number.toUpperCase();
                        }
                        else if(row.work_information.company.entity == '004'){
                            return 'MJ'+row.work_information.employee_number.toUpperCase();
                        }
                        else if(row.work_information.company.entity == '005'){
                            return 'NU'+row.work_information.employee_number.toUpperCase();
                        }
                    }
                    else{
                        return row.empno;
                    }
                }
            },
            {
                data: null,
                "render": function(data,type,row){
                    return (row.last_name + ', ' + row.first_name + ' ' + row.middle_name).toUpperCase();
                }
            },
            {data: 'work_information.position.job_position_name'},
            {data: 'work_information.branch.entity03_desc'},
            {data: 'work_information.employment_status'},
            {data: 'work_information.company.company_name'},
            {data: 'work_information.department.deptdesc'},
            {
                data: 'work_information.date_hired',
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
            $('#employeesTable_filter').after('<br><br>');
            $('#employees_list').show();
            $('#filter1').keyup();
            $('#loading').hide();
        }
    });

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

$('#haveChildren').on('change', function() {
    if($(this).is(':checked')){
        $('.children_information').show();
        setTimeout(() => {
            var targetPosition = $(".children_information").offset().top;
            $('html, body').animate({
                scrollTop: targetPosition
              }, 500);
        }, 500);
    }
    else{
        $('.children_information').hide();
    }
});

function changeCivilStatus(){
    if($('#civil_status').val() == 'MARRIED'
    || $('#civil_status').val() == 'WIDOWED'
    || $('#civil_status').val() == 'SEPARATED'
    ){
        $('.haveChildren').show();
        $('#haveChildren').prop('checked', false).prop('disabled', false);
        $('#haveChildren').change();
    }
    else if($('#civil_status').val() == 'SOLO PARENT'){
        $('.haveChildren').show();
        $('#haveChildren').prop('checked', true).prop('disabled',true);
        $('#haveChildren').change();
    }
    else{
        $('.haveChildren').hide();
        $('.children_information').hide();
    }
}

function changeEmploymentStatus(){
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
        html: `<h4 style="color:#0d1a80 !important;">` + data.username + ` [` + data.role + `]` + `</h4>` + `<br>` + `<ol style="text-align: left !important;font-weight:600 !important;">` +  data.activity.replaceAll(" [","<li>[") + `</li></ol>`,
        width: 850,
    });
});

$('#btnCancel').on('click', function() {
    Swal.fire({
        title: 'Do you want to exit?',
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
    }).then((cancel) => {
        if(cancel.isConfirmed){
            $('#loading').show();
            setTimeout(function(){
                location.href = "/employees";
            }, 1000);
        }
    });
});