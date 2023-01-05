//Clear Form (Current Page,All Pages)
setInterval(checkclearform,0);
function checkclearform(){
    if($('.required_field').filter(function(){ return !!this.value; }).length < 1 
        && $('.multiple_field').filter(function(){ return !!this.value; }).length < 1 
        && $('.separated').filter(function(){ return !!this.value; }).length < 1) {
        $('#btnClear').prop("disabled",true);
    }
    else{
        $('#btnClear').prop("disabled",false);
    }
}

//This JS page is to clear form (current page, all pages)
$('#btnClear').on('click',function(){
    $('#personal_info').css('zoom','95%');
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
            if (clear.isDenied) { 
                //Clear All Pages
                new bootstrap.Toast(document.querySelector('#clearAll')).show();
                $('#personal_info').css('zoom','100%');
                $('#termination_div').hide();
                $('#resignation_div').hide();
                $('.separated').val('');
                $('.required_field').val('');
                $('.optional_field').val('');
                $('.multiple_field').val('');
                $('#default').prop('checked',true);
                $('.span_all').show();
                $('.children_information').hide();
                $('#spouse').hide();
                $('#benefits').hide();
                $('#employee_image').val(''); //Remove the image uploaded
                $('#image_preview').attr('src',''); //Remove current preview
                $('#image_preview').hide();

                //Performance Evaluation Tab
                $('#memo_file').val('');
                $('#memo_preview').attr('src','');
                $('#memo_preview').hide();
                $('#memo_view').prop('disabled',true);

                $('#evaluation_file').val('');
                $('#evaluation_preview').attr('src','');
                $('#evaluation_preview').hide();
                $('#evaluation_view').prop('disabled',true);

                $('#contracts_file').val('');
                $('#contracts_preview').attr('src','');
                $('#contracts_preview').hide();
                $('#contracts_view').prop('disabled',true);

                $('#resignation_file').val('');
                $('#resignation_preview').attr('src','');
                $('#resignation_preview').hide();
                $('#resignation_view').prop('disabled',true);

                $('#termination_file').val('');
                $('#termination_preview').attr('src','');
                $('#termination_preview').hide();
                $('#termination_view').prop('disabled',true);

                //Document Tab
                $('#barangay_clearance_file').val('');
                $('#barangay_clearance_preview').attr('src','');
                $('#barangay_clearance_preview').hide();
                $('#barangay_clearance_view').prop('disabled',true);
                
                $('#birthcertificate_file').val('');
                $('#birthcertificate_preview').attr('src','');
                $('#birthcertificate_preview').hide();
                $('#birthcertificate_view').prop('disabled',true);

                $('#diploma_file').val('');
                $('#diploma_preview').attr('src','');
                $('#diploma_preview').hide();
                $('#diploma_view').prop('disabled',true);

                $('#medical_certificate_file').val('');
                $('#medical_certificate_preview').attr('src','');
                $('#medical_certificate_preview').hide();
                $('#medical_certificate_view').prop('disabled',true);

                $('#nbi_clearance_file').val('');
                $('#nbi_preview').attr('src','');
                $('#nbi_preview').hide();
                $('#nbi_clearance_view').prop('disabled',true);

                $('#pag_ibig_file').val('');
                $('#pag_ibig_preview').attr('src','');
                $('#pag_ibig_preview').hide();
                $('#pag_ibig_view').prop('disabled',true);

                $('#philhealth_file').val('');
                $('#philhealth_preview').attr('src','');
                $('#philhealth_preview').hide();
                $('#philhealth_view').prop('disabled',true);

                $('#police_clearance_file').val('');
                $('#police_clearance_preview').attr('src','');
                $('#police_clearance_preview').hide();
                $('#police_clearance_view').prop('disabled',true);

                $('#resume_file').val('');
                $('#resume_preview').attr('src','');
                $('#resume_preview').hide();
                $('#resume_view').prop('disabled',true);

                $('#sss_file').val('');
                $('#sss_preview').attr('src','');
                $('#sss_preview').hide();
                $('#sss_view').prop('disabled',true);

                $('#tor_file').val('');
                $('#tor_preview').attr('src','');
                $('#tor_preview').hide();
                $('#tor_view').prop('disabled',true);

                $('#image_close').hide(); 
                $('#image_user').show();
                $('#image_button').show();
                $('#image_instruction').show();

                //Clear Multiple Table Data
                $('.children_information').hide();
                $('.btn_children').click();
                $('.btn_college').click();
                $('.btn_training').click();
                $('.btn_vocational').click();
                $('.btn_job').click();

            } 
            else if (clear.isConfirmed) {
                //Clear Current Page
                new bootstrap.Toast(document.querySelector('#clearCurrent')).show();
                
                $('.separated').val('');
                $('#termination_div').hide();
                $('#resignation_div').hide();
                $('#personal_info').css('zoom','100%');
                $('.required_field:visible').val('');
                $('.optional_field:visible').val('');
                $('.multiple_field:visible').val('');
                $('#btnClear').prop('disabled',true);
                $('#spouse').hide();
                $('#solo_parent').hide();
        
                if($('#personal_info').is(":visible")){
                    $('#employee_image').val(''); //Remove the image inserted
                    $('#image_preview').attr('src',''); //Remove current preview
                    $('#image_preview').hide();
                    $('#image_close').hide();
                    $('#image_user').show();
                    $('#image_button').show();
                    $('#image_instruction').show();
                    $('#default').prop('checked',true);

                    $('.children_information').hide();
                    $('.btn_children').click();
                    $('.btn_training').click();
                    $('.btn_vocational').click();
                    $('.btn_job').click();
                }

                if($('#work_info').is(":visible")){
                    $('#benefits').hide();
                }

                if($('#education_trainings').is(":visible")){
                    $('.btn_college').click();
                    $('.btn_training').click();
                    $('.btn_vocational').click();
                }

                if($('#job_history').is(":visible")){
                    $('.btn_job').click();
                }

                if($('#evaluation').is(":visible")){
                    $('.btn_memo').click();
                    $('.btn_evaluation').click();
                    $('.btn_contracts').click();
                    $('.btn_resignation').click();
                    $('.btn_evaluation').click();

                    $('#memo_file').val('');
                    $('#memo_preview').attr('src','');
                    $('#memo_preview').hide();
                    $('#memo_view').prop('disabled',true);

                    $('#evaluation_file').val('');
                    $('#evaluation_preview').attr('src','');
                    $('#evaluation_preview').hide();
                    $('#evaluation_view').prop('disabled',true);

                    $('#contracts_file').val('');
                    $('#contracts_preview').attr('src','');
                    $('#contracts_preview').hide();
                    $('#contracts_button').show();

                    $('#resignation_file').val('');
                    $('#resignation_preview').attr('src','');
                    $('#resignation_preview').hide();
                    $('#resignation_view').prop('disabled',true);

                    $('#termination_file').val('');
                    $('#termination_preview').attr('src','');
                    $('#termination_preview').hide();
                    $('#termination_view').prop('disabled',true);
                }

                if($('#documents').is(":visible")){
                    $('#barangay_clearance_file').val('');
                    $('#barangay_clearance_preview').attr('src','');
                    $('#barangay_clearance_preview').hide();
                    $('#barangay_clearance_view').prop('disabled',true);

                    $('#birthcertificate_file').val('');
                    $('#birthcertificate_preview').attr('src','');
                    $('#birthcertificate_preview').hide();
                    $('#birthcertificate_view').prop('disabled',true);

                    $('#diploma_file').val('');
                    $('#diploma_preview').attr('src','');
                    $('#diploma_preview').hide();
                    $('#diploma_view').prop('disabled',true);

                    $('#medical_certificate_file').val('');
                    $('#medical_certificate_preview').attr('src','');
                    $('#medical_certificate_preview').hide();
                    $('#medical_certificate_view').prop('disabled',true);

                    $('#nbi_clearance_file').val('');
                    $('#nbi_preview').attr('src','');
                    $('#nbi_preview').hide();
                    $('#nbi_clearance_view').prop('disabled',true);

                    $('#pag_ibig_file').val('');
                    $('#pag_ibig_preview').attr('src','');
                    $('#pag_ibig_preview').hide();
                    $('#pag_ibig_view').prop('disabled',true);

                    $('#philhealth_file').val('');
                    $('#philhealth_preview').attr('src','');
                    $('#philhealth_preview').hide();
                    $('#philhealth_view').prop('disabled',true);

                    $('#police_clearance_file').val('');
                    $('#police_clearance_preview').attr('src','');
                    $('#police_clearance_preview').hide();
                    $('#police_clearance_view').prop('disabled',true);

                    $('#resume_file').val('');
                    $('#resume_preview').attr('src','');
                    $('#resume_preview').hide();
                    $('#resume_view').prop('disabled',true);

                    $('#sss_file').val('');
                    $('#sss_preview').attr('src','');
                    $('#sss_preview').hide();
                    $('#sss_view').prop('disabled',true);

                    $('#tor_file').val('');
                    $('#tor_preview').attr('src','');
                    $('#tor_preview').hide();
                    $('#tor_view').prop('disabled',true);
                }
            }
            $('#personal_info').css('zoom','100%');
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
