$('#positionUpdate').on('click', function(){
    var position_id = $('#position_id').val();
    var job_position_name = $('#job_position_name').val();
    var job_description = $('#job_description').val();
    var job_requirements = $('#job_requirements').val();

    Swal.fire({
        title: 'Do you want to save changes?',
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
                url: '/maintenance/positionUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    position_id:position_id,
                    job_position_name:job_position_name,
                    job_description:job_description,
                    job_requirements:job_requirements
                },
                success: function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#positionModal').modal('hide');
                        Swal.fire({
                            title:'JOB DESCRIPTION UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: true
                        });
                        setTimeout(function(){positionTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#loading').show();
                        $('#positionModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){positionTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    });
});