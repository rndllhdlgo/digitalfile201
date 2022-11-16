//Fetch Employee Data
$(document).on('dblclick','table.employeesTable tbody tr',function(){//View employee information on tr double click
    var data = employeesTable.row(this).data();
    // var id = $(this).attr('id');
    var id = data.id;
    $('#tab1').click();
    $('#btnClear').hide();
    $('#btnEnableEdit').show();
    $('#btnSave').hide();
    $('#title_details').html('<i class="fas fa-info"></i> <b>VIEW DETAILS</b>');
  //Data Tables for Fetch
    $('#college_education_container').hide();
    $('#college_education_data_table_div').show();
    $('#vocational_container').hide();
    $('#vocational_data_table_div').show();
    $('#training_container').hide();
    $('#training_data_table_div').show();
    $('#job_container').hide();
    $('#job_data_table_div').show();
    $('#memos_container').hide();
    $('#memos_data_table_div').show();
    $('#evaluation_container').hide();
    $('#evaluation_data_table_div').show();
    $('#contracts_container').hide();
    $('#contracts_data_table_div').show();
    $('#resignation_container').hide();
    $('#resignation_data_table_div').show();
    $('#termination_container').hide();
    $('#termination_data_table_div').show();
    
    $.ajax({
        url: "/employees/fetch",
        method: 'get',
        data:{id:id},
        dataType:'json',
        success:function(data){
          //Personal Information
            //Show Data
            $('#output').prop('src',window.location.origin+'/storage/cover_images/'+data.cover_image);//Returns base URL/to get the current url (window.location.origin)
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#middle_name').val(data.middle_name);
            $('#suffix').val(data.suffix);
            $('#birthday').val(data.birthday);
            $('#birthday').change();
            $('#gender').val(data.gender);
            $('#civil_status').val(data.civil_status);
            $('#home_address').val(data.home_address);
            $('#email_address').val(data.email_address);
            $('#telephone_number').val(data.telephone_number);
            $('#cellphone_number').val(data.cellphone_number);
            $('#spouse_name').val(data.spouse_name);
            $('#spouse_contact_number').val(data.spouse_contact_number);
            $('#spouse_profession').val(data.spouse_profession);
            $('#father_name').val(data.father_name);
            $('#father_contact_number').val(data.father_contact_number);
            $('#father_profession').val(data.father_profession);
            $('#mother_name').val(data.mother_name);
            $('#mother_contact_number').val(data.mother_contact_number);
            $('#mother_profession').val(data.mother_profession);
            $('#emergency_contact_name').val(data.emergency_contact_name);
            $('#emergency_contact_relationship').val(data.emergency_contact_relationship);
            $('#emergency_contact_number').val(data.emergency_contact_number);

            //Add Border Color
        //Personal Information
            // $('#output').css('border','1px solid #0d1a80');
            $('#first_name').css('border','1px solid #0d1a80');
            $('#last_name').css('border','1px solid #0d1a80');
            $('#middle_name').css('border','1px solid #0d1a80');
            if($('#suffix').val()){
                $('#suffix').css('border','1px solid #0d1a80');
            }
            $('#age').css('border','1px solid #0d1a80');
            $('#gender').css('border','1px solid #0d1a80');
            $('#home_address').css('border','1px solid #0d1a80');
            $('#email_address').css('border','1px solid #0d1a80');
            if($('#telephone_number').val()){
                $('#telephone_number').css('border','1px solid #0d1a80');
            }
            $('#cellphone_number').css('border','1px solid #0d1a80');
            $('#spouse_name').css('border','1px solid #0d1a80');
            $('#spouse_contact_number').css('border','1px solid #0d1a80');
            $('#spouse_profession').css('border','1px solid #0d1a80');
            $('#father_name').css('border','1px solid #0d1a80');
            $('#father_contact_number').css('border','1px solid #0d1a80');
            $('#father_profession').css('border','1px solid #0d1a80');
            $('#mother_name').css('border','1px solid #0d1a80');
            $('#mother_contact_number').css('border','1px solid #0d1a80');
            $('#mother_profession').css('border','1px solid #0d1a80');
            $('#emergency_contact_name').css('border','1px solid #0d1a80');
            $('#emergency_contact_relationship').css('border','1px solid #0d1a80');
            $('#emergency_contact_number').css('border','1px solid #0d1a80');
        //Work Information
            $('#employee_number').css('border','1px solid #0d1a80');
            $('#company_of_employee').css('border','1px solid #0d1a80');
            $('#branch_of_employee').css('border','1px solid #0d1a80');
            $('#status_of_employee').css('border','1px solid #0d1a80');
            $('#shift_of_employee').css('border','1px solid #0d1a80');
            $('#position_of_employee').css('border','1px solid #0d1a80');
            $('#supervisor_of_employee').css('border','1px solid #0d1a80');
            $('#date_hired').css('border','1px solid #0d1a80');
            $('#employee_email_address').css('border','1px solid #0d1a80');
            $('#employee_contact_number').css('border','1px solid #0d1a80');
            $('#sss_number').css('border','1px solid #0d1a80');
            $('#pag_ibig_number').css('border','1px solid #0d1a80');
            $('#philhealth_number').css('border','1px solid #0d1a80');
            $('#tin_number').css('border','1px solid #0d1a80');
            $('#account_number').css('border','1px solid #0d1a80');
            
            //Hide (Required) text
            $('.span_first_name').hide();
            $('.span_last_name').hide();
            $('.span_middle_name').hide();
            if($('#suffix').val()){
                $('.span_suffix').hide();
            }
            $('.span_birthday').hide();
            $('.span_gender').hide();
            $('.span_civil_status').hide();
            $('.span_home_address').hide();
            $('.span_email_address').hide();
            if($('#telephone_number').val()){
                $('.span_telephone_number').hide();
            }
            $('.span_cellphone_number').hide();
            $('.span_father_name').hide();
            if($('#father_contact_number').val()){
                $('.span_father_contact_number').hide();
            }
            $('.span_father_profession').hide();
            $('.span_mother_name').hide();
            if($('#mother_contact_number').val()){
                $('.span_mother_contact_number').hide();
            }
            $('.span_mother_profession').hide();
            $('.span_emergency_contact_name').hide();
            $('.span_emergency_contact_relationship').hide();
            $('.span_emergency_contact_number').hide();
            //Work Information            
            $('.span_employee_number').hide();
            $('.span_company_of_employee').hide();
            $('.span_branch_of_employee').hide();
            $('.span_status_of_employee').hide();
            $('.span_shift_of_employee').hide();
            $('.span_position_of_employee').hide();
            $('.span_supervisor_of_employee').hide();
            $('.span_date_hired').hide();
            $('.span_employee_email_address').hide();
            $('.span_employee_contact_number').hide();
            $('.span_sss_number').hide();
            $('.span_pag-ibig_number').hide();
            $('.span_philhealth_number').hide();
            $('.span_tin_number').hide();
            $('.span_account_number').hide();
        //Education Information
            // Secondary
            $('.span_secondary_school_name').hide();
            $('.span_secondary_school_address').hide();
            $('.span_secondary_school_inclusive_years').hide();
            //Primary
            $('.span_primary_school_name').hide();
            $('.span_primary_school_address').hide();
            $('.span_primary_school_inclusive_years').hide();
            $('#check_duplicate').remove();

            //Disable Edit
            $('#first_name').prop("disabled",true);
            $('#last_name').prop("disabled",true);
            $('#middle_name').prop("disabled",true);
            $('#suffix').prop("disabled",true);
            $('#birthday').prop("disabled",true);
            $('#gender').prop("disabled",true);
            $('#civil_status').change();
            $('#civil_status').prop("disabled",true);
            $('#home_address').prop("disabled",true);
            $('#email_address').prop("disabled",true);
            $('#telephone_number').prop("disabled",true);
            $('#cellphone_number').prop("disabled",true);
            $('#spouse_name').prop("disabled",true);
            $('#spouse_contact_number').prop("disabled",true);
            $('#spouse_profession').prop("disabled",true);
            $('#father_name').prop("disabled",true);
            $('#father_contact_number').prop("disabled",true);
            $('#father_profession').prop("disabled",true);
            $('#mother_name').prop("disabled",true);
            $('#mother_contact_number').prop("disabled",true);
            $('#mother_profession').prop("disabled",true);
            $('#emergency_contact_name').prop("disabled",true);
            $('#emergency_contact_relationship').prop("disabled",true);
            $('#emergency_contact_number').prop("disabled",true);
        //Work Information
            //Show Data
            $('#employee_number').val(data.employee_number);
            $('#company_of_employee').val(data.company_of_employee);
            $('#branch_of_employee').val(data.branch_of_employee);
            $('#status_of_employee').val(data.status_of_employee);
            $('#shift_of_employee').val(data.shift_of_employee);
            $('#position_of_employee').val(data.position_of_employee);
            $('#supervisor_of_employee').val(data.supervisor_of_employee);
            $('#date_hired').val(data.date_hired);
            $('#employee_email_address').val(data.employee_email_address);
            $('#employee_contact_number').val(data.employee_contact_number);
            $('#sss_number').val(data.sss_number);
            $('#pag_ibig_number').val(data.pag_ibig_number);
            $('#philhealth_number').val(data.philhealth_number);
            $('#tin_number').val(data.tin_number);
            $('#account_number').val(data.account_number);
            //Disable Edit
            $('#employee_number').prop("disabled",true);
            $('#company_of_employee').prop("disabled",true);
            $('#branch_of_employee').prop("disabled",true);
            $('#status_of_employee').prop("disabled",true);
            $('#shift_of_employee').prop("disabled",true);
            $('#position_of_employee').prop("disabled",true);
            $('#supervisor_of_employee').prop("disabled",true);
            $('#date_hired').prop("disabled",true);
            $('#employee_email_address').prop("disabled",true);
            $('#employee_contact_number').prop("disabled",true);
            $('#sss_number').prop("disabled",true);
            $('#pag_ibig_number').prop("disabled",true);
            $('#philhealth_number').prop("disabled",true);
            $('#tin_number').prop("disabled",true);
            $('#account_number').prop("disabled",true);
          //Educational Information
            //Secondary
            //Show Data
            $('#secondary_school_name').val(data.secondary_school_name);
            $('#secondary_school_address').val(data.secondary_school_address);
            $('#secondary_school_inclusive_years').val(data.secondary_school_inclusive_years);
            //Disable Edit
            $('#secondary_school_name').prop("disabled",true);
            $('#secondary_school_address').prop("disabled",true);
            $('#secondary_school_inclusive_years').prop("disabled",true);
            //Primary
            //Show Data
            $('#primary_school_name').val(data.primary_school_name);
            $('#primary_school_address').val(data.primary_school_address);
            $('#primary_school_inclusive_years').val(data.primary_school_inclusive_years);
            //Disable Edit
            $('#primary_school_name').prop("disabled",true);
            $('#primary_school_address').prop("disabled",true);
            $('#primary_school_inclusive_years').prop("disabled",true);

            $('#hidden_id').val(id);
            $('#employee_personal_information').show();
            $('#employees_list').hide();
            $('#addEmployeeBtn').hide();
            $('.custom_file').hide();
            $('.image_icon').hide();
            $('#preview_image').show();

            //Fetch Data Table of College Education
            $(document).ready( function () { 
                $('#college_education_data_table').dataTable().fnDestroy();//To destroy the data table
                  $('#college_education_data_table').DataTable({
                      dom:'rt',
                      processing:true,
                      serverSide:false,
                      ajax: {
                      url: '/employees/collegeDataTable', //route-name
                      data:{
                          employee_id: id
                      }
                      },
                      //data column name
                      columns: [
                          {data: 'college_name'},
                          {data: 'college_degree'},
                          {data: 'college_inclusive_years'}
                      ],
                  });    
              });

            //Fetch Data Table of Vocational 
            $(document).ready( function () {
              $('#vocational_data_table').dataTable().fnDestroy();//To destroy the data table
                $('#vocational_data_table').DataTable({
                    dom:'rt',
                    processing:true,
                    serverSide:false,
                    ajax: {
                    url: '/employees/vocationalDataTable', //route-name
                    data:{
                        employee_id: id
                    }
                    },
                    //data column name
                    columns: [
                        {data: 'vocational_name'},
                        {data: 'vocational_course'},
                        {data: 'vocational_inclusive_years'}
                    ],
                });    
            });

            // //Fetch Data Table of Training
            $(document).ready( function () { 
              $('#trainings_data_table').dataTable().fnDestroy();//To destroy the data table
                $('#trainings_data_table').DataTable({
                    dom:'rt',
                    processing:true,
                    serverSide:false,
                    ajax: {
                    url: '/employees/trainingsDataTable', //route-name
                    data:{
                        employee_id: id
                    }
                    },
                    //data column name
                    columns: [
                        {data: 'training_name'},
                        {data: 'training_title'},
                        {data: 'training_inclusive_years'}
                    ],
                });    
            });

            //Fetch Data Table of Job History
            $(document).ready( function () { 
              $('#job_data_table').dataTable().fnDestroy();//To destroy the data table
                $('#job_data_table').DataTable({
                    dom:'rt',
                    processing:true,
                    serverSide:false,
                    ajax: {
                    url: '/employees/jobDataTable', //route-name
                    data:{
                        employee_id: id
                    }
                    },
                    //data column name
                    columns: [
                        {data: 'job_name'},
                        {data: 'job_position'},
                        {data: 'job_address'},
                        {data: 'job_contact_details'},
                        {data: 'job_inclusive_years'}
                    ],
                });    
            });

            //Fetch Data Table of Memos Received
            $(document).ready( function () { 
              $('#memos_data_table').dataTable().fnDestroy();//To destroy the data table
                $('#memos_data_table').DataTable({
                    dom:'rt',
                    processing:true,
                    serverSide:false,
                    ajax: {
                    url: '/employees/memosDataTable', //route-name
                    data:{
                        employee_id: id
                    }
                    },
                    //data column name
                    columns: [
                        {data: 'memo_subject'},
                        {data: 'memo_date'},
                        {data: 'memo_option'},
                        {data: 'memo_file'}
                    ],
                });    
            });

            //Fetch Data Table of Evaluation
            $(document).ready( function () { 
              $('#evaluation_data_table').dataTable().fnDestroy();//To destroy the data table
                $('#evaluation_data_table').DataTable({
                    dom:'rt',
                    processing:true,
                    serverSide:false,
                    ajax: {
                    url: '/employees/evaluationDataTable', //route-name
                    data:{
                        employee_id: id
                    }
                    },
                    //data column name
                    columns: [
                        {data: 'evaluation_reason'},
                        {data: 'evaluation_date'},
                        {data: 'evaluation_evaluated_by'},
                        {data: 'evaluation_file'}
                    ],
                });    
            });

            //Fetch Data Table of Contracts
            $(document).ready( function () { 
              $('#contracts_data_table').dataTable().fnDestroy();//To destroy the data table
                $('#contracts_data_table').DataTable({
                    dom:'rt',
                    processing:true,
                    serverSide:false,
                    ajax: {
                    url: '/employees/contractsDataTable', //route-name
                    data:{
                        employee_id: id
                    }
                    },
                    //data column name
                    columns: [
                        {data: 'contracts_type'},
                        {data: 'contracts_date'},
                        {data: 'contracts_file'}
                    ],
                });    
            });

            //Fetch Data Table of Contracts
            $(document).ready( function () { 
              $('#resignation_data_table').dataTable().fnDestroy();//To destroy the data table
                $('#resignation_data_table').DataTable({
                    dom:'rt',
                    processing:true,
                    serverSide:false,
                    ajax: {
                    url: '/employees/resignationDataTable', //route-name
                    data:{
                        employee_id: id
                    }
                    },
                    //data column name
                    columns: [
                        {data: 'resignation_letter'},
                        {data: 'resignation_date'},
                        {data: 'resignation_file'}
                    ],
                });    
            });

            //Fetch Data Table of Termination
            $(document).ready( function () { 
              $('#termination_data_table').dataTable().fnDestroy();//To destroy the data table
                $('#termination_data_table').DataTable({
                    dom:'rt',
                    processing:true,
                    serverSide:false,
                    ajax: {
                    url: '/employees/terminationDataTable', //route-name
                    data:{
                        employee_id: id
                    }
                    },
                    //data column name
                    columns: [
                        {data: 'termination_letter'},
                        {data: 'termination_date'},
                        {data: 'termination_file'}
                    ],
                });    
            });
        }
    });
});

//Fetch User Data
$('#usersTable tbody').on('dblclick','tr',function(){
    var table = $('table.usersTable').DataTable();
    var data = table.row(this).data();
    var id = data.id;

    $('#user_level').val(data.user_level);
    $('#name').val(data.name);
    $('#email').val(data.email);
    $('#status').val(data.status);
    $('#user_id').val(data.id);

    $('.modal-title').html('<i class="fas fa-user-edit"></i> UPDATE USER');

    $('.span_user_level').hide();
    $('.span_name').hide();
    $('.span_email').hide();
    $('.span_status').hide();
    $('.password-container').hide();

    $('#btnUserSave').hide();
    $('#btnUserUpdate').show();

    $('#usersModal').modal('show');
});