var logs_id = [];
var college_id = [];
$(document).on('click','table.employeesTable tbody tr',function(){
    logs_id = [];
    college_id = [];
    
    if(!employeesTable.data().any()){ return false; }
    var data = employeesTable.row(this).data();
    var id = data.id;

    $.ajax({
        url: '/employees/fetch',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: 'GET',
        data:{
            id: id,
        },
        success: function(data){
            var employee_data = $.map(data.data, function(value, index){
                return [value];
            });
            employee_data.forEach(value => {

                $('#hidden_id').val(value.id);
                //Personal Information
                if(value.employee_image){
                    $('#filename').val(value.employee_image);
                    $('#image_preview').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                    $('#image_preview').show();
                    $('#image_user').hide();
                    $('#image_button').hide();
                    $('#image_close').show();
                }
                else{
                    $('#filename').val('');
                }
                
                $('#filename_delete').val('');

                $('#first_name').val(value.first_name);
                $('#middle_name').val(value.middle_name);
                $('#last_name').val(value.last_name);
                $('#suffix').val(value.suffix);
                $('#nickname').val(value.nickname);
                $('#birthday').val(value.birthday);
                setInterval(() => {
                    $('#birthday').change();
                }, app_timeout);
                $('#gender').val(value.gender);
                $('#civil_status').val(value.civil_status);
                $('#street').val(value.street);

                $('.region').each(function(){
                    if($(this).html() == value.region){
                        $(this).prop('selected', true);
                    }
                });
                setTimeout(() => {
                    $('#region').change();
                    setTimeout(() => {
                        $('.province').each(function(){
                            if($(this).html() == value.province){
                                $(this).prop('selected', true);
                            }
                        });
                        setTimeout(() => {
                            $('#province').change();  
                            setTimeout(() => {
                                $('.city').each(function(){
                                    if($(this).html() == value.city){
                                        $(this).prop('selected', true);
                                    }
                                });
                                setTimeout(() => {
                                    $('#city').change();
                                }, app_timeout);
                            }, app_timeout);
                        }, app_timeout);
                    }, app_timeout);
                }, app_timeout);

                $('#height').val(decodeHtml(value.height));
                $('#weight').val(value.weight);
                $('#religion').val(value.religion);
                $('#email_address').val(value.email_address);
                $('#telephone_number').val(value.telephone_number);
                $('#cellphone_number').val(value.cellphone_number);
                $('#spouse_name').val(value.spouse_name);
                $('#spouse_contact_number').val(value.spouse_contact_number);
                $('#spouse_profession').val(value.spouse_profession);
                $('#father_name').val(value.father_name);
                $('#father_contact_number').val(value.father_contact_number);
                $('#father_profession').val(value.father_profession);
                $('#mother_name').val(value.mother_name);
                $('#mother_contact_number').val(value.mother_contact_number);
                $('#mother_profession').val(value.mother_profession);
                $('#emergency_contact_name').val(value.emergency_contact_name);
                $('#emergency_contact_relationship').val(value.emergency_contact_relationship);
                $('#emergency_contact_number').val(value.emergency_contact_number);

                $('#employee_number').val(value.employee_number);
                $('#employee_company').val(value.employee_company);
                $('#employee_department').val(value.employee_department);
                $('#employee_branch').val(value.employee_branch);
                $('#employee_status').val(value.employee_status);
                setInterval(() => {
                    $('#employee_status').change();
                }, app_timeout);
                $('#employment_origin').val(value.employment_origin);
                $('#employee_shift').val(value.employee_shift);
                $('#employee_supervisor').val(value.employee_supervisor);
                $('#employee_position').val(value.employee_position);
                $('#date_hired').val(value.date_hired);
                $('#company_email_address').val(value.company_email_address);
                $('#company_contact_number').val(value.company_contact_number);
                $('#sss_number').val(value.sss_number);
                $('#pag_ibig_number').val(value.pag_ibig_number);
                $('#philhealth_number').val(value.philhealth_number);
                $('#tin_number').val(value.tin_number);
                $('#account_number').val(value.account_number);

                $('#employee_salary').val(value.employee_salary);
                $('#employee_incentives').val(value.employee_incentives);
                $('#employee_overtime_pay').val(value.employee_overtime_pay);
                $('#employee_bonus').val(value.employee_bonus);
                $('#employee_insurance').val(value.employee_insurance);

                $('#secondary_school_name').val(value.secondary_school_name);
                $('#secondary_school_address').val(value.secondary_school_address);
                $('#secondary_school_inclusive_years').val(value.secondary_school_inclusive_years);
                $('#primary_school_name').val(value.primary_school_name);
                $('#primary_school_address').val(value.primary_school_address);
                $('#primary_school_inclusive_years').val(value.primary_school_inclusive_years);

                $('#past_medical_condition').val(value.past_medical_condition);
                $('#allergies').val(value.allergies);
                $('#medication').val(value.medication);
                $('#psychological_history').val(value.psychological_history);
                
                $('#employee_information').show();
                $('#addEmployeeBtn').hide();
                $('#employees_list').hide();
                $('#tab1').click();
                $('#btnClear').hide();
                $('#btnSave').hide();
                $('#note_required').hide();
                $('#note_information').show();

                $('.sample_table_orig').dataTable().fnDestroy();
                $('.sample_table_orig').DataTable({
                    columnDefs: [
                        {
                            "render": function(data, type, row, meta){
                                    return '<button type="button" class="btn btn-danger btn_delete_sample center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
                            },
                            "defaultContent": '',
                            "data": null,
                            "targets": [3],
                        }
                    ],
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
                        url: '/employees/logs_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'sample1'},
                        { data: 'sample2'},
                        { data: 'sample3'}
                    ],
                });

                $('.college_table_orig').dataTable().fnDestroy();
                $('.college_table_orig').DataTable({
                    columnDefs: [
                        {
                            "render": function(data, type, row, meta){
                                    return '<button type="button" class="btn btn-danger btn_delete_college center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
                            },
                            "defaultContent": '',
                            "data": null,
                            "targets": [3],
                        }
                    ],
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
                        url: '/employees/college_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'college_name'},
                        { data: 'college_degree'},
                        { data: 'college_inclusive_years'}
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
            });
        }
    });
});

$(document).on('click','.btn_delete_sample',function(){
    var id = $(this).attr("id");
    var data = $('.sample_table_orig').DataTable().row(id).data();
    logs_id.push(data.id);
    alert(logs_id);
    $(this).parent().parent().remove();
});

$(document).on('click','.btn_delete_college',function(){
    var id = $(this).attr("id");
    var data = $('.college_table_orig').DataTable().row(id).data();
    college_id.push(data.id);
    alert(college_id);
    $(this).parent().parent().remove();
});

setInterval(() => {
    if($('#btnUpdate').is(":visible")){
        if(!$('.sample_table_orig').DataTable().data().any()){
            $('#sample_table_orig').hide();
        }
        else{
            $('#sample_table_orig').show();
        }
    }
}, 0);