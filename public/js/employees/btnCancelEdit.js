//This JS page is to cancel edit
$('#btnCancelEdit').on('click',function(){
    Swal.fire({
        title: 'Do you want to cancel edit details?',
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
      if (cancel.isConfirmed) {
        $('#image_button').hide();
        $('#title_details').html('<b><i class="fas fa-info"></i> VIEW EMPLOYEE DETAILS</b>');
        $('#btnUpdate').hide();
        $('#btnEnableEdit').show();
        $('#btnCancelEdit').hide();
        $('#btnCancel').show();
        //Personal Information
        $('#first_name').prop("disabled",true);
        $('#last_name').prop("disabled",true);
        $('#middle_name').prop("disabled",true);
        $('#suffix').prop("disabled",true);
        $('#birthday').prop("disabled",true);
        $('#gender').prop("disabled",true);
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
      //Educational Information
        //Secondary
        $('#secondary_school_name').prop("disabled",true);
        $('#secondary_school_address').prop("disabled",true);
        $('#secondary_school_inclusive_years').prop("disabled",true);
        //Primary
        $('#primary_school_name').prop("disabled",true);
        $('#primary_school_address').prop("disabled",true);
        $('#primary_school_inclusive_years').prop("disabled",true);
      } else if (cancel.isDenied) {
      }
    });
});