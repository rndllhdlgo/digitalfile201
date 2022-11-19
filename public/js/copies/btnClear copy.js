//Clear Employee Form
$('#btnClear').on('click',function(){
    Swal.fire({
        title: 'Do you want to clear the form?',
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
    }).then((clear) => {
      if (clear.isConfirmed) {
        $('.required_field').val('');
        $('.optional_field').val('');
        $('#cover_image').val(''); //Remove the image uploaded
        $('#preview_image').attr('src',''); //Remove current preview
        $('#preview_image').hide();
        //Clear Documents
        $('#birthcertificate_file').val('');
        $('#preview_birthcertificate').attr('src','');
        $('#preview_birthcertificate').hide();
        $('#birthcertificate_button').show();
        $('#birthcertificate_text').html('No file chosen, yet.');
        $('#eye_birthcertificate').prop('disabled',true);
        $('#replace_birthcertificate').prop('disabled',true);

        $('#nbi_file').val('');
        $('#preview_nbi').attr('src','');
        $('#preview_nbi').hide();
        $('#nbi_button').show();
        $('#nbi_text').html('No file chosen, yet.');
        $('#eye_nbi').prop('disabled',true);
        $('#replace_nbi').prop('disabled',true);

        $('#barangay_clearance_file').val('');
        $('#preview_barangay_clearance').attr('src','');
        $('#preview_barangay_clearance').hide();
        $('#barangay_clearance_button').show();
        $('#barangay_clearance_text').html('No file chosen, yet.');
        $('#eye_barangay_clearance').prop('disabled',true);
        $('#replace_barangay_clearance').prop('disabled',true);

        $('#police_clearance_file').val('');
        $('#preview_police_clearance').attr('src','');
        $('#preview_police_clearance').hide();
        $('#police_clearance_button').show();
        $('#police_clearance_text').html('No file chosen, yet.');
        $('#eye_police_clearance').prop('disabled',true);
        $('#replace_police_clearance').prop('disabled',true);

        $('#sss_file').val('');
        $('#preview_sss').attr('src','');
        $('#preview_sss').hide();
        $('#sss_button').show();
        $('#sss_text').html('No file chosen, yet.');
        $('#eye_sss').prop('disabled',true);
        $('#replace_sss').prop('disabled',true);

        $('#philhealth_file').val('');
        $('#preview_philhealth').attr('src','');
        $('#preview_philhealth').hide();
        $('#philhealth_button').show();
        $('#philhealth_text').html('No file chosen, yet.');
        $('#eye_philhealth').prop('disabled',true);
        $('#replace_philhealth').prop('disabled',true);
        
        $('#pag_ibig_file').val('');
        $('#preview_pag_ibig').attr('src','');
        $('#preview_pag_ibig').hide();
        $('#pag_ibig_button').show();
        $('#pag_ibig_text').html('No file chosen, yet.');
        $('#eye_pag_ibig').prop('disabled',true);
        $('#replace_pag_ibig').prop('disabled',true);

        $('#image_close').hide(); 
        $('#image_user').show();
        $('#image_button').show();
        $('.column-1').css("height","250px");
        $('#image_button').css("margin-top","198px");
        // $('#image_close').click();

        $('#college_education_table').hide();
        $('.removeCollegeRow').click();
        $('#vocational_table').hide();
        $('.removeVocationalRow').click();
        $('#trainings_table').hide();
        $('.removeTrainingRow').click();
        $('#job_table').hide();
        $('.removeJobRow').click();
        $('#memos_table').hide();
        $('.removeMemoRow').click();
        $('#evaluation_table').hide();
        $('.removeEvaluationRow').click();
        $('#contracts_table').hide();
        $('.removeContractsRow').click();
        $('#resignation_table').hide();
        $('.removeResignationRow').click();
        $('#termination_table').hide();
        $('.removeTerminationRow').click();

      } else if (clear.isDenied) {
      }
    });
});

//Clear User Form
$('#btnUserClear').on('click',function(){
  Swal.fire({
      title: 'Do you want to clear the form?',
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
  }).then((clear) => {
      if (clear.isConfirmed) {
          $('#user_level').val('');
          $('#name').val('');
          $('#email').val('');
          $('#password').val('');
          $('#confirm').val('');
          $('#status').val('');
      } 
      else if (clear.isDenied) {
      }
  });
});