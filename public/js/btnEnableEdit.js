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
          // $('#image_button').css('margin-top','1px');
          // $('.column-1').css('height','290px');
          $('#btnCancelEdit').show();
          $('#btnEnableEdit').hide();
          $('#btnCancel').hide();
        //Personal Information
          $('.required_label').show();
          $('.optional_label').show();
          $('#first_name').prop("disabled",false);
          $('#last_name').prop("disabled",false);
          $('#middle_name').prop("disabled",false);
          $('#suffix').prop("disabled",false);
          $('#birthday').prop("disabled",false);
          $('#gender').prop("disabled",false);
          $('#civil_status').prop("disabled",false);
          $('#home_address').prop("disabled",false);
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
          $('#company_of_employee').prop("disabled",false);
          $('#branch_of_employee').prop("disabled",false);
          $('#status_of_employee').prop("disabled",false);
          $('#shift_of_employee').prop("disabled",false);
          $('#position_of_employee').prop("disabled",false);
          $('#supervisor_of_employee').prop("disabled",false);
          $('#date_hired').prop("disabled",false);
          $('#employee_email_address').prop("disabled",false);
          $('#employee_contact_number').prop("disabled",false);
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