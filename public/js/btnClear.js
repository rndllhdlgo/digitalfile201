//Clear Employee Form
$('#btnClear').on('click',function(){
    $('#personal_information').css('zoom','95%');
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
                $('#memo_file').val('');
                $('#memo_preview').attr('src','');//change the image source
                $('#memo_preview').hide();
                $('#memo_text').html('No file chosen, yet.');
                $('#memo_button').show();
                $('#memo_view').prop('disabled',true);
                $('#memo_replace').prop('disabled',true);

                $('#evaluation_file').val('');
                $('#evaluation_preview').attr('src','');//change the image source
                $('#evaluation_preview').hide();
                $('#evaluation_text').html('No file chosen, yet.');
                $('#evaluation_button').show();
                $('#evaluation_view').prop('disabled',true);
                $('#evaluation_replace').prop('disabled',true);

                $('#contracts_file').val('');
                $('#contracts_preview').attr('src','');//change the image source
                $('#contracts_preview').hide();
                $('#contracts_text').html('No file chosen, yet.');
                $('#contracts_button').show();
                $('#contracts_view').prop('disabled',true);
                $('#contracts_replace').prop('disabled',true);

                $('#resignation_file').val('');
                $('#resignation_preview').attr('src','');//change the image source
                $('#resignation_preview').hide();
                $('#resignation_text').html('No file chosen, yet.');
                $('#resignation_button').show();
                $('#resignation_view').prop('disabled',true);
                $('#resignation_replace').prop('disabled',true);

                $('#termination_file').val('');
                $('#preview_termination').attr('src','');//change the image source
                $('#preview_termination').hide();
                $('#termination_text').html('No file chosen, yet.');
                $('#termination_button').show();
                $('#termination_view').prop('disabled',true);
                $('#termination_replace').prop('disabled',true);

                //Document Tab
                $('#birthcertificate_file').val('');
                $('#birthcertificate_preview').attr('src','');
                $('#birthcertificate_preview').hide();
                $('#birthcertificate_button').show();
                $('#birthcertificate_text').html('No file chosen, yet.');
                $('#birthcertificate_view').prop('disabled',true);
                $('#birthcertificate_replace').prop('disabled',true);

                $('#nbi_file').val('');
                $('#nbi_preview').attr('src','');
                $('#nbi_preview').hide();
                $('#nbi_button').show();
                $('#nbi_text').html('No file chosen, yet.');
                $('#nbi_view').prop('disabled',true);
                $('#nbi_replace').prop('disabled',true);

                $('#barangay_clearance_file').val('');
                $('#barangay_clearance_preview').attr('src','');
                $('#barangay_clearance_preview').hide();
                $('#barangay_clearance_button').show();
                $('#barangay_clearance_text').html('No file chosen, yet.');
                $('#barangay_clearance_view').prop('disabled',true);
                $('#barangay_clearance_replace').prop('disabled',true);

                $('#police_clearance_file').val('');
                $('#police_clearance_preview').attr('src','');
                $('#police_clearance_preview').hide();
                $('#police_clearance_button').show();
                $('#police_clearance_text').html('No file chosen, yet.');
                $('#police_clearance_view').prop('disabled',true);
                $('#police_clearance_replace').prop('disabled',true);

                $('#sss_file').val('');
                $('#sss_preview').attr('src','');
                $('#sss_preview').hide();
                $('#sss_button').show();
                $('#sss_text').html('No file chosen, yet.');
                $('#sss_view').prop('disabled',true);
                $('#sss_replace').prop('disabled',true);

                $('#philhealth_file').val('');
                $('#philhealth_preview').attr('src','');
                $('#philhealth_preview').hide();
                $('#philhealth_button').show();
                $('#philhealth_text').html('No file chosen, yet.');
                $('#philhealth_view').prop('disabled',true);
                $('#philhealth_replace').prop('disabled',true);
                
                $('#pag_ibig_file').val('');
                $('#pag_ibig_preview').attr('src','');
                $('#pag_ibig_preview').hide();
                $('#pag_ibig_button').show();
                $('#pag_ibig_text').html('No file chosen, yet.');
                $('#pag_ibig_view').prop('disabled',true);
                $('#pag_ibig_replace').prop('disabled',true);

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
            } 
            else if (clear.isConfirmed) {//Clear Current Page
                $('#personal_information').css('zoom','100%');
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
                    // $('#image_button').css("margin-top","198px");
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

                    $('#memo_file').val('');
                    $('#memo_preview').attr('src','');//change the image source
                    $('#memo_preview').hide();
                    $('#memo_text').html('No file chosen, yet.');
                    $('#memo_button').show();
                    $('#memo_view').prop('disabled',true);
                    $('#memo_replace').prop('disabled',true);

                    $('#evaluation_file').val('');
                    $('#evaluation_preview').attr('src','');//change the image source
                    $('#evaluation_preview').hide();
                    $('#evaluation_text').html('No file chosen, yet.');
                    $('#evaluation_button').show();
                    $('#evaluation_view').prop('disabled',true);
                    $('#evaluation_replace').prop('disabled',true);

                    $('#contracts_file').val('');
                    $('#contracts_preview').attr('src','');//change the image source
                    $('#contracts_preview').hide();
                    $('#contracts_text').html('No file chosen, yet.');
                    $('#contracts_button').show();
                    $('#contracts_view').prop('disabled',true);
                    $('#contracts_replace').prop('disabled',true);

                    $('#resignation_file').val('');
                    $('#resignation_preview').attr('src','');//change the image source
                    $('#resignation_preview').hide();
                    $('#resignation_text').html('No file chosen, yet.');
                    $('#resignation_button').show();
                    $('#resignation_view').prop('disabled',true);
                    $('#resignation_replace').prop('disabled',true);

                    $('#termination_file').val('');
                    $('#preview_termination').attr('src','');//change the image source
                    $('#preview_termination').hide();
                    $('#termination_text').html('No file chosen, yet.');
                    $('#termination_button').show();
                    $('#termination_view').prop('disabled',true);
                    $('#termination_replace').prop('disabled',true);
                }

                if($('#documents').is(":visible")){ //Clear all file chosen on documents tab
                    $('#birthcertificate_file').val('');
                    $('#birthcertificate_preview').attr('src','');
                    $('#birthcertificate_preview').hide();
                    $('#birthcertificate_button').show();
                    $('#birthcertificate_text').html('No file chosen, yet.');
                    $('#birthcertificate_view').prop('disabled',true);
                    $('#birthcertificate_replace').prop('disabled',true);

                    $('#nbi_file').val('');
                    $('#nbi_preview').attr('src','');
                    $('#nbi_preview').hide();
                    $('#nbi_button').show();
                    $('#nbi_text').html('No file chosen, yet.');
                    $('#nbi_view').prop('disabled',true);
                    $('#nbi_replace').prop('disabled',true);

                    $('#barangay_clearance_file').val('');
                    $('#barangay_clearance_preview').attr('src','');
                    $('#barangay_clearance_preview').hide();
                    $('#barangay_clearance_button').show();
                    $('#barangay_clearance_text').html('No file chosen, yet.');
                    $('#barangay_clearance_view').prop('disabled',true);
                    $('#barangay_clearance_replace').prop('disabled',true);

                    $('#police_clearance_file').val('');
                    $('#police_clearance_preview').attr('src','');
                    $('#police_clearance_preview').hide();
                    $('#police_clearance_button').show();
                    $('#police_clearance_text').html('No file chosen, yet.');
                    $('#police_clearance_view').prop('disabled',true);
                    $('#police_clearance_replace').prop('disabled',true);

                    $('#sss_file').val('');
                    $('#sss_preview').attr('src','');
                    $('#sss_preview').hide();
                    $('#sss_button').show();
                    $('#sss_text').html('No file chosen, yet.');
                    $('#sss_view').prop('disabled',true);
                    $('#sss_replace').prop('disabled',true);

                    $('#philhealth_file').val('');
                    $('#philhealth_preview').attr('src','');
                    $('#philhealth_preview').hide();
                    $('#philhealth_button').show();
                    $('#philhealth_text').html('No file chosen, yet.');
                    $('#philhealth_view').prop('disabled',true);
                    $('#philhealth_replace').prop('disabled',true);

                    $('#pag_ibig_file').val('');
                    $('#pag_ibig_preview').attr('src','');
                    $('#pag_ibig_preview').hide();
                    $('#pag_ibig_button').show();
                    $('#pag_ibig_text').html('No file chosen, yet.');
                    $('#pag_ibig_view').prop('disabled',true);
                    $('#pag_ibig_replace').prop('disabled',true);
                }
            }
            $('#personal_information').css('zoom','100%');
            $('.nav-tabs').css('zoom','100%');
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
