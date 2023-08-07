$('#addPositionBtn').on('click',function(){
    $('#positionModal').modal('show');
    $('#job_position_name').val('');
    $('#job_description').val('');
    $('#job_requirements').val('');
    $('#positionSave').show();
    $('#positionUpdate').hide();
});

$('.btnCancel, .close').on('click',function(){
    $('.modal').modal('hide');
});

$('#job_position_name').on('keyup',function(){
    if(position_orig != $.trim($('#job_position_name').val()).toUpperCase()){
        $.ajax({
            url: "/position/checkDuplicate",
            data:{
                job_position_name : $.trim($('#job_position_name').val()).toUpperCase(),
            },
            success: function(data){
                if(data == 'true'){
                    $('.validation').show();
                    $('#positionSave').prop('disabled',true);
                    $('#positionUpdate').prop('disabled',true);
                }
                else{
                    $('.validation').hide();
                    $('#positionSave').prop('disabled',false);
                    $('#positionUpdate').prop('disabled',false);
                }
            }
        });
    }
});

// Save
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

//View
var position_orig;
$('#positionTable').on('click', 'tbody tr', function(){
    var data = positionTable.row(this).data();

    $('#position_id').val(data.id);
    $('#job_position_name').val(data.job_position_name);
    position_orig = data.job_position_name;
    $('#job_description').val(data.job_description);
    $('#job_requirements').val(data.job_requirements);

    $('#positionSave').hide();
    $('#positionUpdate').show();

    $('#positionModal').modal('show');
});

// Update
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