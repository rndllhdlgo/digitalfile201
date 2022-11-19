//Fetch Employee Data
$(document).on('dblclick','table.employeesTable tbody tr',function(){//View employee information on tr double click
    var data = employeesTable.row(this).data();
    // var id = $(this).attr('id');
    var id = data.id;
    // alert('.');
    // return false;
    $('#tab1').click();
    $('#btnClear').hide();
    $('#btnEnableEdit').show();
    $('#btnSave').hide();
    $('#title_details').html('<i class="fas fa-info"></i> <b>VIEW DETAILS</b>');
    
    $.ajax({
        url: "/employees/fetchPersonalInformation",
        method: 'get',
        data:{id:id},
        dataType:'json',
        success:function(data){
            //Show Data
        //Personal Information Tab
            $('#image_preview').prop('src',window.location.origin+'/storage/cover_images/'+data.employee_image);//Returns base URL/to get the current url (window.location.origin)
            $('#image_preview').css('height','240px');
            $('#first_name').val(data.first_name);
            $('#middle_name').val(data.middle_name);
            $('#last_name').val(data.last_name);
            $('#suffix').val(data.suffix);
            $('#nickname').val(data.nickname);
            $('#birthday').val(data.birthday);
            $('#birthday').change();
            $('#gender').val(data.gender);
            $('#civil_status').val(data.civil_status);
            $('#street').val(data.street);
            $("#region option:selected").text(data.region);
            $("#province option:selected").text(data.province);
            $("#city option:selected").text(data.city);
            $('#height').val(data.height);
            $('#weight').val(data.weight);
            $('#religion').val(data.religion);
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
        //Work Information Tab
            $('#employee_number').val(data.employee_number);
            $('#employee_company').val(data.employee_company);
            $('#employee_branch').val(data.employee_branch);
            $('#employee_status').val(data.employee_status);
            $('#employee_shift').val(data.employee_shift);
            $('#employee_position').val(data.employee_position);
            $('#employee_supervisor').val(data.employee_supervisor);
            $('#date_hired').val(data.date_hired);
            $('#company_email_address').val(data.company_email_address);
            $('#company_contact_number').val(data.company_contact_number);
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

            //Hide (Required,Optional) text
            $('.span_all').hide();

            $('#duplicate_email_address').remove();
            $('#duplicate_telephone_number').remove();
            $('#duplicate_cellphone_number').remove();
            $('#duplicate_father_contact_number').remove();
            $('#duplicate_mother_contact_number').remove();
            $('#duplicate_emergency_contact_number').remove();
            $('#check_duplicate').remove();

            //Disable Edit
            $('.required_field').css('cursor','not-allowed');
            $('.optional_field').css('cursor','not-allowed');
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
            $('#region').css('border','1px solid #0d1a80');
            $('#province').prop("disabled",true);
            $('#province').css('border','1px solid #0d1a80');
            $('#city').prop("disabled",true);
            $('#city').css('border','1px solid #0d1a80');
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
            $('#employee_company').prop("disabled",true);
            $('#employee_branch').prop("disabled",true);
            $('#employee_status').prop("disabled",true);
            $('#employee_shift').prop("disabled",true);
            $('#employee_position').prop("disabled",true);
            $('#employee_supervisor').prop("disabled",true);
            $('#date_hired').prop("disabled",true);
            $('#company_email_address').prop("disabled",true);
            $('#company_contact_number').prop("disabled",true);
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
            $('#image_preview').show();

            // $('#solo_parent_table').hide();
            // $('#solo_parent_data_table').show();
            // $('#solo_parent_tr').show();
            // $('#child_age').change();

            // $(document).ready( function () { 
            //       $('#solo_parent_data_table').DataTable({
            //           dom:'rt',
            //           processing:true,
            //           serverSide:false,
            //           ajax: {
            //           url: '/employees/childrenDataTable', //route-name
            //           data:{
            //               employee_id: id
            //           }
            //           },
            //           //data column name
            //           columns: [
            //               {data: 'child_name'},
            //               {data: 'child_birthday'},
            //               {data: 'child_gender'}
            //           ],
            //       });    
            //   });
        }
    });
});