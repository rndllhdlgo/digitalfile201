//This JS page is to allow the user to edit the data
$('#btnEnableEdit').on('click',function(){
    Swal.fire({
        title: 'Do you want to edit details?',
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
          $('#title_details').html('<b><i class="fas fa-user-edit"></i> EDIT EMPLOYEE DETAILS</b>');
          $('#btnUpdate').show();
          $('#image_button').show();
          $('#btnCancelEdit').show();
          $('#btnEnableEdit').hide();
          $('#btnCancel').hide();
        //Personal Information
          $('.required_label').show();
          $('.optional_label').show();
          $('.required_field').css('cursor','auto');
          $('.optional_field').css('cursor','auto');
          $('#sss_number').css('cursor','auto');
          $('#pag_ibig_number').css('cursor','auto');
          $('#philhealth_number').css('cursor','auto');
          $('#tin_number').css('cursor','auto');
          $('#account_number').css('cursor','auto');
          $('#first_name').prop("disabled",false);
          $('#last_name').prop("disabled",false);
          $('#middle_name').prop("disabled",false);
          $('#suffix').prop("disabled",false);
          $('#birthday').prop("disabled",false);
          $('#gender').prop("disabled",false);
          $('#civil_status').prop("disabled",false);
          $('#street').prop("disabled",false);
          $('#region').prop("disabled",false);
          $('#province').prop("disabled",false);
          $('#city').prop("disabled",false);
          $('#email_address').prop("disabled",false);
          $('#telephone_number').prop("disabled",false);
          $('#cellphone_number').prop("disabled",false);
          $('#spouse_name').prop("disabled",false);
          $('#spouse_contact_number').prop("disabled",false);
          $('#spouse_profession').prop("disabled",false);
          $('#father_name').prop("disabled",false);
          $('#father_contact_number').prop("disabled",false);
          $('#father_profession').prop("disabled",false);
          $('#mother_name').prop("disabled",false);
          $('#mother_contact_number').prop("disabled",false);
          $('#mother_profession').prop("disabled",false);
          $('#emergency_contact_name').prop("disabled",false);
          $('#emergency_contact_relationship').prop("disabled",false);
          $('#emergency_contact_number').prop("disabled",false);
        //Work Information
          $('#span_employee_number').hide();
          $('#employee_company').prop("disabled",false);
          $('#employee_branch').prop("disabled",false);
          $('#employee_status').prop("disabled",false);
          $('#employee_shift').prop("disabled",false);
          $('#employee_position').prop("disabled",false);
          $('#employee_supervisor').prop("disabled",false);
          $('#date_hired').prop("disabled",false);
          $('#company_email_address').prop("disabled",false);
          $('#company_contact_number').prop("disabled",false);
          $('#sss_number').prop("disabled",false);
          $('#pag_ibig_number').prop("disabled",false);
          $('#philhealth_number').prop("disabled",false);
          $('#tin_number').prop("disabled",false);
          $('#account_number').prop("disabled",false);
          //Educational Information
          //Secondary
          $('#secondary_school_name').prop("disabled",false);
          $('#secondary_school_address').prop("disabled",false);
          $('#secondary_school_inclusive_years').prop("disabled",false);
          //Primary
          $('#primary_school_name').prop("disabled",false);
          $('#primary_school_address').prop("disabled",false);
          $('#primary_school_inclusive_years').prop("disabled",false);

      } 
      else if (cancel.isDenied) {
      
      }
    });
});