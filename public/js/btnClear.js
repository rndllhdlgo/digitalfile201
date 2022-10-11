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
        $('.optional').val('');
        $('#cover_image').val(''); //Remove the image inserted
        $('#output').attr('src',''); //Remove current preview
        $('#output').hide(); 
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