//Clear Employee Form
$('#btnClear').on('click',function(){
    $('#personal_information').css('zoom','95%');
    $('.nav-tabs').css('zoom','98%');
        Swal.fire({
            title: 'Do you want to clear the form?',
            allowOutsideClick: false,
            allowEscapeKey: false,
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Current Page',
            denyButtonText: 'All Pages',
            customClass: {
            actions: 'my-actions',
            confirmButton: 'order-1',
            denyButton: 'order-2',
            cancelButton: 'order-3',
            }
        })
      .then((clear) => {
            if (clear.isDenied) { //Clear All Fields
                $('#personal_information').css('zoom','100%');
                $('.nav-tabs').css('zoom','100%');
                $('.required_field').val('');
                $('.required_field').removeClass('blue');
                $('.optional').val('');
                $('.optional').removeClass('blue');
                $('.span_all').show();
                $('.multiple_field').val('');
                $('.multiple_field').removeClass('blue');
                $('.column-1').removeClass('blue');
                $('#solo_parent').hide();
                $('#spouse').hide();
                $('#benefits').hide();
                $('#cover_image').val(''); //Remove the image uploaded
                $('#preview_image').attr('src',''); //Remove current preview
                $('#preview_image').hide();

                //Performance Evaluation Tab
                $('#resignation_file').val('');
                $('#preview_resignation').attr('src','');//change the image source
                $('#preview_resignation').hide();
                $('#resignation_text').html('No file chosen, yet.');
                $('#resignation_button').show();
                $('#eye_resignation').prop('disabled',true);
                $('#replace_resignation').prop('disabled',true);

                $('#termination_file').val('');
                $('#preview_termination').attr('src','');//change the image source
                $('#preview_termination').hide();
                $('#termination_text').html('No file chosen, yet.');
                $('#termination_button').show();
                $('#eye_termination').prop('disabled',true);
                $('#replace_termination').prop('disabled',true);

                //Document Tab
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

                //Clear Multiple Table Data
                $('.btn-college').click();
                $('.btn-training').click();
                $('.btn-vocational').click();
                $('.btn-job').click();
                $('.btn-memo').click();
                $('.btn-evaluation').click();
                $('.btn-contract').click();
                $('.btn-resignation').click();
                $('.btn-termination').click();
            } 
            else if (clear.isConfirmed) {//Clear Current Page
                $('#personal_information').css('zoom','100%');
                $('.nav-tabs').css('zoom','100%');
                $('.required_field:visible').val('');
                $('.optional:visible').val('');
                $('.multiple_field:visible').val('');
                $('#btnClear').prop('disabled',true);
                $('#spouse').hide();
                $('#solo_parent').hide();
        
                if($('.column-1').is(":visible")){
                    $('#cover_image').val(''); //Remove the image inserted
                    $('#preview_image').attr('src',''); //Remove current preview
                    $('#preview_image').hide();
                    $('#image_close').hide();
                    $('#image_user').show();
                    $('#image_button').show();
                    $('.column-1').css("height","250px");
                    $('#image_button').css("margin-top","198px");
                    $('.column-1').removeClass('blue');
                }
                if($('#personal_information').is(":visible")){
                    $('.btn-solo-parent').click();
                    $('#solo_parent_data_table').hide();
                }
                if($('#work_information').is(":visible")){
                    $('#benefits').hide();
                }
                if($('#educational_background').is(":visible")){
                    $('.btn-college').click();
                    $('.btn-training').click();
                    $('.btn-vocational').click();
                }
                if($('#job_history').is(":visible")){
                    $('.btn-job').click();
                }
                if($('#performance_evaluation').is(":visible")){
                    $('.btn-memo').click();
                    $('.btn-evaluation').click();
                    $('.btn-contract').click();

                    $('#resignation_file').val('');
                    $('#preview_resignation').attr('src','');//change the image source
                    $('#preview_resignation').hide();
                    $('#resignation_text').html('No file chosen, yet.');
                    $('#resignation_button').show();
                    $('#eye_resignation').prop('disabled',true);
                    $('#replace_resignation').prop('disabled',true);

                    $('#termination_file').val('');
                    $('#preview_termination').attr('src','');//change the image source
                    $('#preview_termination').hide();
                    $('#termination_text').html('No file chosen, yet.');
                    $('#termination_button').show();
                    $('#eye_termination').prop('disabled',true);
                    $('#replace_termination').prop('disabled',true);
                }

                if($('#documents').is(":visible")){ //Clear all file chosen on documents tab
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
                }
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
