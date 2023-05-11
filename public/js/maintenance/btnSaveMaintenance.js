$('#positionSave').on('click',function(){
    var job_position_name = $('#job_position_name').val();
    var job_description = $('#job_description').val().split("\n").join(' \n');
    var job_requirements = $('#job_requirements').val().split("\n").join(' \n');

    Swal.fire({
        title: 'Do you want to save?',
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
    }).then((save) => {
        if(save.isConfirmed){
            $('#loading').show();
            $.ajax({
                url: '/maintenance/positionSave',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    job_position_name:job_position_name,
                    job_description:job_description,
                    job_requirements:job_requirements
                },
                success: function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#positionModal').modal('hide');
                        Swal.fire({
                            title: 'JOB POSITION ADDED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){positionTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#loading').hide();
                        $('#positionModal').modal('hide');
                        Swal.fire({
                            title: 'SAVE FAILED',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){positionTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    });
});