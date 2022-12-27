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
            if (clear.isDenied) { 
                //Clear All Pages
                new bootstrap.Toast(document.querySelector('#clearAll')).show();
                $('#tab1').click();
                $('#personal_information').css('zoom','100%');
                $('#termination_div').hide();
                $('#resignation_div').hide();
                $('.separated').val('');
                $('.required_field').val('');
                $('.required_field').removeClass('blue');
                $('.optional_field').val('');
                $('.optional_field').removeClass('blue');
                $('.span_all').show();
                $('.multiple_field').val('');
                $('.multiple_field').removeClass('blue');
                $('.column-1').removeClass('blue');
                $('#solo_parent').hide();
                $('#spouse').hide();
                $('#benefits').hide();
                $('#employee_image').val(''); //Remove the image uploaded
                $('#image_preview').attr('src',''); //Remove current preview
                $('#image_preview').hide();

                //Performance Evaluation Tab
                $('#memo_file').val('');
                $('#memo_preview').attr('src','');
                $('#memo_preview').hide();
                $('#memo_text').html('No file chosen');
                $('#memo_button').show();
                $('#memo_view').prop('disabled',true);
                $('#memo_replace').prop('disabled',true);

                $('#evaluation_file').val('');
                $('#evaluation_preview').attr('src','');
                $('#evaluation_preview').hide();
                $('#evaluation_text').html('No file chosen.');
                $('#evaluation_button').show();
                $('#evaluation_view').prop('disabled',true);
                $('#evaluation_replace').prop('disabled',true);

                $('#contracts_file').val('');
                $('#contracts_preview').attr('src','');
                $('#contracts_preview').hide();
                $('#contracts_text').html('No file chosen.');
                $('#contracts_button').show();
                $('#contracts_view').prop('disabled',true);
                $('#contracts_replace').prop('disabled',true);

                $('#resignation_file').val('');
                $('#resignation_preview').attr('src','');
                $('#resignation_preview').hide();
                $('#resignation_text').html('No file chosen.');
                $('#resignation_button').show();
                $('#resignation_view').prop('disabled',true);
                $('#resignation_replace').prop('disabled',true);

                $('#termination_file').val('');
                $('#termination_preview').attr('src','');
                $('#termination_preview').hide();
                $('#termination_text').html('No file chosen.');
                $('#termination_button').show();
                $('#termination_view').prop('disabled',true);
                $('#termination_replace').prop('disabled',true);

                //Document Tab
                $('#birthcertificate_file').val('');
                $('#birthcertificate_preview').attr('src','');
                $('#birthcertificate_preview').hide();
                $('#birthcertificate_button').show();
                $('#birthcertificate_text').html('No file chosen.');
                $('#birthcertificate_view').prop('disabled',true);
                $('#birthcertificate_replace').prop('disabled',true);

                $('#nbi_clearance_file').val('');
                $('#nbi_preview').attr('src','');
                $('#nbi_preview').hide();
                $('#nbi_button').show();
                $('#nbi_text').html('No file chosen.');
                $('#nbi_clearance_view').prop('disabled',true);
                $('#nbi_replace').prop('disabled',true);

                $('#barangay_clearance_file').val('');
                $('#barangay_clearance_preview').attr('src','');
                $('#barangay_clearance_preview').hide();
                $('#barangay_clearance_button').show();
                $('#barangay_clearance_text').html('No file chosen.');
                $('#barangay_clearance_view').prop('disabled',true);
                $('#barangay_clearance_replace').prop('disabled',true);

                $('#police_clearance_file').val('');
                $('#police_clearance_preview').attr('src','');
                $('#police_clearance_preview').hide();
                $('#police_clearance_button').show();
                $('#police_clearance_text').html('No file chosen.');
                $('#police_clearance_view').prop('disabled',true);
                $('#police_clearance_replace').prop('disabled',true);

                $('#sss_file').val('');
                $('#sss_preview').attr('src','');
                $('#sss_preview').hide();
                $('#sss_button').show();
                $('#sss_text').html('No file chosen.');
                $('#sss_view').prop('disabled',true);
                $('#sss_replace').prop('disabled',true);

                $('#philhealth_file').val('');
                $('#philhealth_preview').attr('src','');
                $('#philhealth_preview').hide();
                $('#philhealth_button').show();
                $('#philhealth_text').html('No file chosen.');
                $('#philhealth_view').prop('disabled',true);
                $('#philhealth_replace').prop('disabled',true);
                
                $('#pag_ibig_file').val('');
                $('#pag_ibig_preview').attr('src','');
                $('#pag_ibig_preview').hide();
                $('#pag_ibig_button').show();
                $('#pag_ibig_text').html('No file chosen.');
                $('#pag_ibig_view').prop('disabled',true);
                $('#pag_ibig_replace').prop('disabled',true);

                $('#image_close').hide(); 
                $('#image_user').show();
                $('#image_button').show();
                $('.column-1').css("height","250px");

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
                $('#personal_information').css('zoom','100%');
                $('.required_field:visible').val('');
                $('.optional_field:visible').val('');
                $('.multiple_field:visible').val('');
                $('#btnClear').prop('disabled',true);
                $('#spouse').hide();
                $('#solo_parent').hide();
        
                if($('.column-1').is(":visible")){
                    $('#employee_image').val(''); //Remove the image inserted
                    $('#image_preview').attr('src',''); //Remove current preview
                    $('#image_preview').hide();
                    $('#image_close').hide();
                    $('#image_user').show();
                    $('#image_button').show();
                    $('.column-1').css("height","250px");
                    $('.column-1').removeClass('blue');
                }
                if($('#personal_information').is(":visible")){
                    $('.children_information').hide();
                    $('.btn_children').click();
                    $('.btn_college').click();
                    $('.btn_training').click();
                    $('.btn_vocational').click();
                    $('.btn_job').click();
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
                    $('.btn-contracts').click();
                    $('.btn-resignation').click();
                    $('.btn-evaluation').click();

                    $('#memo_file').val('');
                    $('#memo_preview').attr('src','');
                    $('#memo_preview').hide();
                    $('#memo_text').html('No file chosen.');
                    $('#memo_button').show();
                    $('#memo_view').prop('disabled',true);
                    $('#memo_replace').prop('disabled',true);

                    $('#evaluation_file').val('');
                    $('#evaluation_preview').attr('src','');
                    $('#evaluation_preview').hide();
                    $('#evaluation_text').html('No file chosen.');
                    $('#evaluation_button').show();
                    $('#evaluation_view').prop('disabled',true);
                    $('#evaluation_replace').prop('disabled',true);

                    $('#contracts_file').val('');
                    $('#contracts_preview').attr('src','');
                    $('#contracts_preview').hide();
                    $('#contracts_text').html('No file chosen.');
                    $('#contracts_button').show();
                    $('#contracts_view').prop('disabled',true);
                    $('#contracts_replace').prop('disabled',true);

                    $('#resignation_file').val('');
                    $('#resignation_preview').attr('src','');
                    $('#resignation_preview').hide();
                    $('#resignation_text').html('No file chosen.');
                    $('#resignation_button').show();
                    $('#resignation_view').prop('disabled',true);
                    $('#resignation_replace').prop('disabled',true);

                    $('#termination_file').val('');
                    $('#termination_preview').attr('src','');
                    $('#termination_preview').hide();
                    $('#termination_text').html('No file chosen.');
                    $('#termination_button').show();
                    $('#termination_view').prop('disabled',true);
                    $('#termination_replace').prop('disabled',true);
                }

                if($('#documents').is(":visible")){ //Clear all file chosen on documents tab
                    $('#birthcertificate_file').val('');
                    $('#birthcertificate_preview').attr('src','');
                    $('#birthcertificate_preview').hide();
                    $('#birthcertificate_button').show();
                    $('#birthcertificate_text').html('No file chosen.');
                    $('#birthcertificate_view').prop('disabled',true);
                    $('#birthcertificate_replace').prop('disabled',true);

                    $('#nbi_clearance_file').val('');
                    $('#nbi_preview').attr('src','');
                    $('#nbi_preview').hide();
                    $('#nbi_button').show();
                    $('#nbi_text').html('No file chosen.');
                    $('#nbi_clearance_view').prop('disabled',true);
                    $('#nbi_replace').prop('disabled',true);

                    $('#barangay_clearance_file').val('');
                    $('#barangay_clearance_preview').attr('src','');
                    $('#barangay_clearance_preview').hide();
                    $('#barangay_clearance_button').show();
                    $('#barangay_clearance_text').html('No file chosen.');
                    $('#barangay_clearance_view').prop('disabled',true);
                    $('#barangay_clearance_replace').prop('disabled',true);

                    $('#police_clearance_file').val('');
                    $('#police_clearance_preview').attr('src','');
                    $('#police_clearance_preview').hide();
                    $('#police_clearance_button').show();
                    $('#police_clearance_text').html('No file chosen.');
                    $('#police_clearance_view').prop('disabled',true);
                    $('#police_clearance_replace').prop('disabled',true);

                    $('#sss_file').val('');
                    $('#sss_preview').attr('src','');
                    $('#sss_preview').hide();
                    $('#sss_button').show();
                    $('#sss_text').html('No file chosen.');
                    $('#sss_view').prop('disabled',true);
                    $('#sss_replace').prop('disabled',true);

                    $('#philhealth_file').val('');
                    $('#philhealth_preview').attr('src','');
                    $('#philhealth_preview').hide();
                    $('#philhealth_button').show();
                    $('#philhealth_text').html('No file chosen.');
                    $('#philhealth_view').prop('disabled',true);
                    $('#philhealth_replace').prop('disabled',true);

                    $('#pag_ibig_file').val('');
                    $('#pag_ibig_preview').attr('src','');
                    $('#pag_ibig_preview').hide();
                    $('#pag_ibig_button').show();
                    $('#pag_ibig_text').html('No file chosen.');
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
