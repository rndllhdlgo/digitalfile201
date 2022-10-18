//Fetch Employee Data
$(document).on('dblclick','table.employeesTable tbody tr',function(){//View employee information on tr double click
    var data = employeesTable.row(this).data();
    // var id = $(this).attr('id');
    var id = data.id;
    alert('.');
    return false;
    $('#tab1').click();
    $('#btnClear').hide();
    $('#btnEnableEdit').show();
    $('#btnSave').hide();
    $('#title_details').html('<i class="fas fa-info"></i> <b>VIEW DETAILS</b>');
    
    $.ajax({
        url: "/employees/fetch",
        method: 'get',
        data:{id:id},
        dataType:'json',
        success:function(data){
            //Show Data
            $('#preview_image').prop('src',window.location.origin+'/storage/cover_images/'+data.cover_image);//Returns base URL/to get the current url (window.location.origin)
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#middle_name').val(data.middle_name);
            $('#suffix').val(data.suffix);
            $('#birthday').val(data.birthday);
            $('#birthday').change();
            $('#gender').val(data.gender);
            $('#civil_status').val(data.civil_status);
            $('#street').val(data.street);
            $("#region option:selected").text(data.region);
            $("#province option:selected").text(data.province);
            $("#city option:selected").text(data.city);
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
            if($('#sss_number').val(data.sss_number) || $('#pag_ibig_number').val(data.pag_ibig_number) || $('#philhealth_number').val(data.philhealth_number) || $('#tin_number').val(data.tin_number) || $('#account_number').val(data.account_number)){
                $('#benefits').show();
            }
            else{
                $('#benefits').hide();
            }
            $('#sss_number').val(data.sss_number);
            $('#pag_ibig_number').val(data.pag_ibig_number);
            $('#philhealth_number').val(data.philhealth_number);
            $('#tin_number').val(data.tin_number);
            $('#account_number').val(data.account_number);
            $('#secondary_school_name').val(data.secondary_school_name);
            $('#secondary_school_address').val(data.secondary_school_address);
            $('#secondary_school_inclusive_years').val(data.secondary_school_inclusive_years);
            $('#primary_school_name').val(data.primary_school_name);
            $('#primary_school_address').val(data.primary_school_address);
            $('#primary_school_inclusive_years').val(data.primary_school_inclusive_years);
            
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
            $('.span_street').hide();
            $('.span_region').hide();
            $('.span_province').hide();
            $('.span_city').hide();
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
            $('.span_secondary_school_name').hide();
            $('.span_secondary_school_address').hide();
            $('.span_secondary_school_inclusive_years').hide();
            $('.span_primary_school_name').hide();
            $('.span_primary_school_address').hide();
            $('.span_primary_school_inclusive_years').hide();
            $('#check_duplicate').remove();

            //Disable Edit
            $('.required_field').css('cursor','not-allowed');
            $('.optional').css('cursor','not-allowed');
            $('#sss_number').css('cursor','not-allowed');
            $('#pag_ibig_number').css('cursor','not-allowed');
            $('#philhealth_number').css('cursor','not-allowed');
            $('#tin_number').css('cursor','not-allowed');
            $('#account_number').css('cursor','not-allowed');
            $('#first_name').prop("disabled",true);
            $('#last_name').prop("disabled",true);
            $('#middle_name').prop("disabled",true);
            $('#suffix').prop("disabled",true);
            $('#birthday').prop("disabled",true);
            $('#gender').prop("disabled",true);
            $('#civil_status').change();
            $('#civil_status').prop("disabled",true);
            $('#street').prop("disabled",true);
            $('#region').prop("disabled",true);
            $('#province').prop("disabled",true);
            $('#city').prop("disabled",true);
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
            $('#college_name').prop("disabled",true);
            $('#college_degree').prop("disabled",true);
            $('#college_inclusive_years').prop("disabled",true);
            $('#training_name').prop("disabled",true);
            $('#training_title').prop("disabled",true);
            $('#training_inclusive_years').prop("disabled",true);
            $('#vocational_name').prop("disabled",true);
            $('#vocational_course').prop("disabled",true);
            $('#vocational_inclusive_years').prop("disabled",true);
            $('#secondary_school_name').prop("disabled",true);
            $('#secondary_school_address').prop("disabled",true);
            $('#secondary_school_inclusive_years').prop("disabled",true);
            $('#primary_school_name').prop("disabled",true);
            $('#primary_school_address').prop("disabled",true);
            $('#primary_school_inclusive_years').prop("disabled",true);

            $('#hidden_id').val(id);
            $('#employee_personal_information').show();
            $('#employees_list').hide();
            $('#addEmployeeBtn').hide();
            $('#image_button').hide();
            $('.image_icon').hide();
            $('#preview_image').show();
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