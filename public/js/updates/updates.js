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
                $('#update_image_preview').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                $('#update_image_preview').show();
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
                $('#past_medical_condition').val(value.past_medical_condition);
                $('#allergies').val(value.allergies);
                $('#medication').val(value.medication);
                $('#psychological_history').val(value.psychological_history);

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
                    ],
                    initComplete: function(){
                        if(!$('.college_table_orig').DataTable().data().any()){
                            $('#college_table_orig').hide();
                        }
                        else{
                            $('#college_table_orig').show();
                        }
                    }
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
                    ],
                    initComplete: function(){
                        if(!$('.training_table_orig').DataTable().data().any()){
                            $('#training_table_orig').hide();
                        }
                        else{
                            $('#training_table_orig').show();
                        }
                    }
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
                    initComplete: function(){
                        if(!$('.vocational_table_orig').DataTable().data().any()){
                            $('#vocational_table_orig').hide();
                        }
                        else{
                            $('#vocational_table_orig').show();
                        }
                    }
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
                    initComplete: function(){
                        if(!$('.job_history_table_orig').DataTable().data().any()){
                            $('#job_history_table_orig').hide();
                        }
                        else{
                            $('#job_history_table_orig').show();
                        }
                    }
                });

                $('#loading').hide();
                $('th').removeClass("sorting_asc");
                $('#update_button_group').show();
                $('.forminput').css('cursor','not-allowed');
                $('.forminput').attr('readonly',true);
                $('textarea').css('cursor','not-allowed');
                $('textarea').attr('readonly',true);
                $('#updates_datatables').hide();
                $('#update_form').show();
                $('#update_tab_content').show();
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