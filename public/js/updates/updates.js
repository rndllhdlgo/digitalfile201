var updatesTable = $('#updatesTable').DataTable({
    dom: 'lf<"breakspace">trip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Updates\"",
        "lengthMenu":"Show _MENU_ Updates",
        "emptyTable":"No Updates Data Found!",
        "loadingRecords": "Loading Updates Records...",
    },
    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/update_list',
    },
    order: [],
    columns: [
        { data: "employee_number"},
        {
            data: null,
            "render": function(data,type,row){
                return row.last_name + ', ' + row.first_name + ' ' + row.middle_name;
            }
        },
        { data: "employee_position"},
        { data: "employee_branch"},
        { data: "employment_status"},
        { data: "status"}
    ],
    initComplete: function(){
        $('#loading').hide();
    }
});

$('div.breakspace').html('<br><br>');

$(document).on('click','#updatesTable tbody tr',function(){
    if(!updatesTable.data().any()){ return false; }
    var data = updatesTable.row(this).data();
    var id = data.id;

    $('#loading').show();
    $.ajax({
        url: '/update_fetch',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: 'GET',
        data:{
            id: id,
        },
        success: function(data){
            var update_data = $.map(data.data, function(value, index){
                return [value];
            });
            update_data.forEach(value => {
                $('#hidden_id').val(value.id);
                $('#empno').val(value.empno);
                $('#employee_image').val(value.employee_image);
                $('#image_preview').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                $('#image_preview').show();
                $('#first_name').val(value.first_name);
                $('#middle_name').val(value.middle_name);
                $('#last_name').val(value.last_name);
                $('#suffix').val(value.suffix);
                $('#nickname').val(value.nickname);

                $('#birthday').val(value.birthday);
                setTimeout(() => {
                    $('#birthday').change();
                }, 0);

                $('#gender').val(value.gender);
                $('#address').val(value.address);
                $('#ownership').val(value.ownership);
                $('#province').val(value.province);
                $('#city').val(value.city);
                $('#region').val(value.region);
                $('#height').val(value.height);
                $('#weight').val(value.weight);
                $('#religion').val(value.religion);
                $('#civil_status').val(value.civil_status);
                $('#email_address').val(value.email_address);
                $('#telephone_number').val(value.telephone_number);
                $('#cellphone_number').val(value.cellphone_number);
                $('#father_name').val(value.father_name);
                $('#father_contact_number').val(value.father_contact_number);
                $('#father_profession').val(value.father_profession);
                $('#mother_name').val(value.mother_name);
                $('#mother_contact_number').val(value.mother_contact_number);
                $('#mother_profession').val(value.mother_profession);
                $('#emergency_contact_name').val(value.emergency_contact_name);
                $('#emergency_contact_relationship').val(value.emergency_contact_relationship);
                $('#emergency_contact_number').val(value.emergency_contact_number);
                $('#secondary_school_name').val(value.secondary_school_name);
                $('#secondary_school_address').val(value.secondary_school_address);
                $('#secondary_school_inclusive_years_from').val(value.secondary_school_inclusive_years_from);
                $('#secondary_school_inclusive_years_to').val(value.secondary_school_inclusive_years_to);
                $('#primary_school_name').val(value.primary_school_name);
                $('#primary_school_address').val(value.primary_school_address);
                $('#primary_school_inclusive_years_from').val(value.primary_school_inclusive_years_from);
                $('#primary_school_inclusive_years_to').val(value.primary_school_inclusive_years_to);
                $('#medication').val(value.medication);

                !value.past_medical_condition ? $('#past_medical_condition').removeAttr('placeholder') : $('#past_medical_condition').val(value.past_medical_condition);
                !value.allergies ? $('#allergies').removeAttr('placeholder') : $('#allergies').val(value.allergies);
                !value.medication ? $('#medication').removeAttr('placeholder') : $('#medication').val(value.medication);
                !value.psychological_history ? $('#psychological_history').removeAttr('placeholder') : $('#psychological_history').val(value.psychological_history);

                $('.college_table_orig').dataTable().fnDestroy();
                $('.college_table_orig').DataTable({
                    searching: false,
                    paging: false,
                    info: false,
                    ordering:false,
                    autoWidth: false,
                    language:{
                        emptyTable: "No data available in table",
                        processing: "Loading...",
                    },
                    serverSide: true,
                    ajax: {
                        url: '/updates/college_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'college_name',width: '30%'},
                        { data: 'college_degree', width: '30%'},
                        {
                            data: 'college_inclusive_years_from',
                            "render":function(data,type,row){
                                return "<span class='d-none'>"+row.college_inclusive_years_from+"</span>"+ "FROM: "+moment(row.college_inclusive_years_from).format('MMM. YYYY');
                            },
                            width: '15%'},
                        {
                            data: 'college_inclusive_years_to',
                            "render":function(data,type,row){
                                return "<span class='d-none'>"+row.college_inclusive_years_to+"</span>"+ "TO: "+moment(row.college_inclusive_years_to).format('MMM. YYYY');
                            },
                            width: '15%'}
                    ]
                });

                $('.training_table_orig').dataTable().fnDestroy();
                $('.training_table_orig').DataTable({
                    searching: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    autoWidth: false,
                    language:{
                        emptyTable: "No data available in table",
                        processing: "Loading...",
                    },
                    serverSide: true,
                    ajax: {
                        url: '/updates/training_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'training_name',width: '30%'},
                        { data: 'training_title', width: '30%'},
                        {
                            data: 'training_inclusive_years_from',
                            "render":function(data,type,row){
                                return "<span class='d-none'>"+row.training_inclusive_years_from+"</span>"+ "FROM: "+moment(row.training_inclusive_years_from).format('MMM. YYYY');
                            },
                            width: '15%'},
                        {
                            data: 'training_inclusive_years_to',
                            "render":function(data,type,row){
                                return "<span class='d-none'>"+row.training_inclusive_years_to+"</span>"+ "TO: "+moment(row.training_inclusive_years_to).format('MMM. YYYY');
                            },
                            width: '15%'}
                    ]
                });

                $('.vocational_table_orig').dataTable().fnDestroy();
                $('.vocational_table_orig').DataTable({
                    searching: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    autoWidth: false,
                    language:{
                        emptyTable: "No data available in table",
                        processing: "Loading...",
                    },
                    serverSide: true,
                    ajax: {
                        url: '/updates/vocational_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'vocational_name', width: '30%'},
                        { data: 'vocational_course', width: '30%'},
                        {
                            data: 'vocational_inclusive_years_from',
                            "render":function(data,type,row){
                                return "<span class='d-none'>"+row.vocational_inclusive_years_from+"</span>"+ "FROM: "+moment(row.vocational_inclusive_years_from).format('MMM. YYYY');
                            },
                            width: '15%'
                        },
                        {
                            data: 'vocational_inclusive_years_to',
                            "render":function(data,type,row){
                                return "<span class='d-none'>"+row.vocational_inclusive_years_to+"</span>"+ "TO: "+moment(row.vocational_inclusive_years_to).format('MMM. YYYY');
                            },
                            width: '15%'
                        }
                    ],
                });

                $('.job_history_table_orig').dataTable().fnDestroy();
                $('.job_history_table_orig').DataTable({
                    searching: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    autoWidth: false,
                    language:{
                        emptyTable: "No data available in table",
                        processing: "Loading...",
                    },
                    serverSide: true,
                    ajax: {
                        url: '/updates/job_history_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'job_company_name',width : '15%'},
                        { data: 'job_description',width : '15%'},
                        { data: 'job_position', width: '15%'},
                        { data: 'job_contact_number', width : '15%'},
                        {
                            data: 'job_inclusive_years_from',
                            "render":function(data,type,row){
                                return "<span class='d-none'>"+row.job_inclusive_years_from+"</span>"+ "FROM: "+moment(row.job_inclusive_years_from).format('MMM. YYYY');
                            },
                            width : '15%'
                        },
                        {
                            data: 'job_inclusive_years_to',
                            "render":function(data,type,row){
                                return "<span class='d-none'>"+row.job_inclusive_years_to+"</span>"+ "TO: "+moment(row.job_inclusive_years_to).format('MMM. YYYY');
                            },
                            width : '15%'
                        }
                    ],
                });

                $('#requestTable').dataTable().fnDestroy();
                $('#requestTable').DataTable({
                    // columnDefs: [
                    //     {
                    //         "render": function(data, type, row, meta){
                    //                 return '<button type="button" class="btn btn-danger btn_delete_request center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
                    //         },
                    //         "defaultContent": '',
                    //         "data": null,
                    //         "targets": [3],
                    //     }
                    // ],
                    searching: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    autoWidth: false,
                    language: {
                        info: "Showing _START_ to _END_ of _TOTAL_ REQUEST UPDATES",
                        lengthMenu: "Show _MENU_ REQUEST UPDATES",
                        emptyTable: "No Request Updates Data Found!",
                    },
                    processing: true,
                    ajax: {
                        url: '/updates/request_data',
                        async: false,
                        data:{
                            empno: value.empno,
                        }
                    },
                    order:[],
                    columns: [
                        { data: 'field'},
                        { data: 'original_value'},
                        { data: 'new_value'}
                    ]
                });
                $('div.breakspace').html('<br><br>');

                $('#loading').hide();
                $('th').removeClass("sorting_asc");
                $('#update_button_group').show();
                $('.forminput').css('cursor','not-allowed');
                $('.forminput').attr('readonly',true);
                $('.forminput').removeClass('required_field');
                $('textarea').css('cursor','not-allowed');
                $('textarea').attr('readonly',true);
                $('#updates_datatables').hide();
                $('#update_form').show();
                $('#update_tab_content').show();
            });
        }
    });
});


$(document).on('click','#btnApprove',function(){
    var empno = $('#empno').val();
    var employee_image = $('#employee_image').val();
    var last_name = $('#last_name').val();
    var first_name = $('#first_name').val();
    var middle_name = $('#middle_name').val();
    var suffix = $('#suffix').val();
    var nickname = $('#nickname').val();
    var gender = $('#gender').val();
    var civil_status = $('#civil_status').val();
    var birthday = $('#birthday').val();
    var cellphone_number = $('#cellphone_number').val();
    var address = $('#address').val();
    var ownership = $('#ownership').val();
    var province = $('#province').val();
    var city = $('#city').val();
    var region = $('#region').val();
    var height = $('#height').val();
    var weight = $('#weight').val();
    var religion = $('#religion').val();
    var email_address = $('#email_address').val();
    var telephone_number = $('#telephone_number').val();
    var father_name = $('#father_name').val();
    var father_contact_number = $('#father_contact_number').val();
    var father_profession = $('#father_profession').val();
    var mother_name = $('#mother_name').val();
    var mother_contact_number = $('#mother_contact_number').val();
    var mother_profession = $('#mother_profession').val();
    var emergency_contact_name = $('#emergency_contact_name').val();
    var emergency_contact_relationship = $('#emergency_contact_relationship').val();
    var emergency_contact_number = $('#emergency_contact_number').val();

    Swal.fire({
        title: 'Do you want to approve changes?',
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
    }).then((changes) => {
        if(changes.isConfirmed){

            $.ajax({
                url:"/update_personal_information",
                type:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    empno:empno,
                    employee_image:employee_image,
                    first_name:first_name,
                    middle_name:middle_name,
                    last_name:last_name,
                    suffix:suffix,
                    nickname:nickname,
                    birthday:birthday,
                    gender:gender,
                    address:address,
                    ownership:ownership,
                    province:province,
                    city:city,
                    region:region,
                    height:height,
                    weight:weight,
                    religion:religion,
                    civil_status:civil_status,
                    email_address:email_address,
                    telephone_number:telephone_number,
                    cellphone_number:cellphone_number,
                    father_name:father_name,
                    father_contact_number:father_contact_number,
                    father_profession:father_profession,
                    mother_name:mother_name,
                    mother_contact_number:mother_contact_number,
                    mother_profession:mother_profession,
                    emergency_contact_name:emergency_contact_name,
                    emergency_contact_relationship:emergency_contact_relationship,
                    emergency_contact_number:emergency_contact_number,
                },
                success: function(data){
                    if(data == 'true'){
                        var secondary_school_name = $('#secondary_school_name').val();
                        var secondary_school_address = $('#secondary_school_address').val();
                        var secondary_school_inclusive_years_from = $('#secondary_school_inclusive_years_from').val();
                        var secondary_school_inclusive_years_to = $('#secondary_school_inclusive_years_to').val();
                        var primary_school_name = $('#primary_school_name').val();
                        var primary_school_address = $('#primary_school_address').val();
                        var primary_school_inclusive_years_from = $('#primary_school_inclusive_years_from').val();
                        var primary_school_inclusive_years_to = $('#primary_school_inclusive_years_to').val();

                        $.ajax({
                            url:"/update_educational_attainment",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                empno:empno,
                                secondary_school_name:secondary_school_name,
                                secondary_school_address:secondary_school_address,
                                secondary_school_inclusive_years_from:secondary_school_inclusive_years_from,
                                secondary_school_inclusive_years_to:secondary_school_inclusive_years_to,
                                primary_school_name:primary_school_name,
                                primary_school_address:primary_school_address,
                                primary_school_inclusive_years_from:primary_school_inclusive_years_from,
                                primary_school_inclusive_years_to:primary_school_inclusive_years_to
                            }
                        });

                        var past_medical_condition = $('#past_medical_condition').val();
                        var allergies = $('#allergies').val();
                        var medication = $('#medication').val();
                        var psychological_history = $('#psychological_history').val();

                        $.ajax({
                            url:"/update_medical_history",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                empno:empno,
                                past_medical_condition:past_medical_condition,
                                allergies:allergies,
                                medication:medication,
                                psychological_history:psychological_history,
                            }
                        });

                        $.ajax({
                            url: '/update_college',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                empno: empno,
                            }
                        });

                        $.ajax({
                            url: '/update_training',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                empno: empno,
                            }
                        });

                        $.ajax({
                            url: '/update_vocational',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                empno: empno,
                            }
                        });

                        $.ajax({
                            url: '/update_job_history',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                empno: empno,
                            }
                        });

                        Swal.fire('UPDATE SUCCESS','','success');
                        // setTimeout(function(){window.location.reload();}, 2000);
                    }
                    else{
                        Swal.fire('UPDATE FAILED','','error');
                        // setTimeout(function(){window.location.reload();}, 2000);
                    }
                }
            });
        }
    });
});

$('#tab1').addClass('tabactive');
// Navigation
$('#tab1').on('click',function(){
    $(this).blur();
    $('#tab1').addClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');

    $('#update_personal_info').fadeIn();
    $('#update_education_trainings').hide();
    $('#update_job_history').hide();
    $('#update_medical_history').hide();
});

$('#tab2').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').addClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');

    $('#update_personal_info').hide();
    $('#update_education_trainings').show();
    $('#update_job_history').hide();
    $('#update_medical_history').hide();
});

$('#tab3').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').addClass('tabactive');
    $('#tab4').removeClass('tabactive');

    $('#update_personal_info').hide();
    $('#update_education_trainings').hide();
    $('#update_job_history').show();
    $('#update_medical_history').hide();
});

$('#tab4').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').addClass('tabactive');

    $('#update_personal_info').hide();
    $('#update_education_trainings').hide();
    $('#update_job_history').hide();
    $('#update_medical_history').show();
});

$('#birthday').on('change',function(){
    var today = new Date();
    var birthDate = new Date($('#birthday').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var month = today.getMonth() - birthDate.getMonth();
        if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    return $('#age').val(age);
});


$('#btnViewRequest').on('click',function(){
    $('#requestModal').modal('show');
});

// $(document).on('click','.btn_delete_request',function(){
//     var id = $(this).attr("id");
//     var data = $('.college_table_orig').DataTable().row(id).data();
//     college_id.push(data.id);
//     $(this).parent().parent().remove();
// });