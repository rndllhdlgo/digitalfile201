$('#companySave').on('click',function(){
    var company_name = $('#company_name').val();

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
            $.ajax({
                url: '/maintenance/companySave',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    company_name:company_name
                },
                success: function(data){
                    if(data == 'true'){
                        $('#saveCompanyModal').modal('hide');
                        Swal.fire({
                            title: 'COMPANY ADDED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#saveCompanyModal').modal('hide');
                        Swal.fire({
                            title: 'SAVE FAILED',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#branchSave').on('click',function(){
    var branch_name = $('#branch_name').val();

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
            $.ajax({
                url: '/maintenance/branchSave',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    branch_name:branch_name
                },
                success: function(data){
                    if(data == 'true'){
                        $('#saveBranchModal').modal('hide');
                        Swal.fire({
                            title: 'BRANCH ADDED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){branchTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#saveBranchModal').modal('hide');
                        Swal.fire({
                            title: 'SAVE FAILED',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){branchTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#supervisorSave').on('click',function(){
    var supervisor_name = $('#supervisor_name').val();

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
            $.ajax({
                url: '/maintenance/supervisorSave',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    supervisor_name:supervisor_name
                },
                success: function(data){
                    if(data == 'true'){
                        $('#saveSupervisorModal').modal('hide');
                        Swal.fire({
                            title: 'SUPERVISOR ADDED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#saveSupervisorModal').modal('hide');
                        Swal.fire({
                            title: 'SAVE FAILED',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#shiftSave').on('click',function(){
    var shift_code = $('#shift_code').val();
    var shift_working_hours = $('#shift_working_hours').val();
    var shift_break_time = $('#shift_break_time').val();

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
            $.ajax({
                url: '/maintenance/shiftSave',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    shift_code:shift_code,
                    shift_working_hours:shift_working_hours,
                    shift_break_time:shift_break_time
                },
                success: function(data){
                    if(data == 'true'){
                        $('#saveShiftModal').modal('hide');
                        Swal.fire({
                            title:'SHIFT ADDED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){shiftTable.ajax.reload();}, 2000);
                    }
                    
                    else{
                        $('#saveShiftModal').modal('hide');
                        Swal.fire({
                            title: 'SAVE FAILED',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){shiftTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#jobPositionAndDescriptionSave').on('click',function(){
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
            $.ajax({
                url: '/maintenance/jobPositionAndDescriptionSave',
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
                        $('#saveJobPositionAndDescriptionModal').modal('hide');
                        Swal.fire({
                            title: 'JOB POSITION ADDED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){jobPositionAndDescriptionTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#saveJobPositionAndDescriptionModal').modal('hide');
                        Swal.fire({
                            title: 'SAVE FAILED',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){jobPositionAndDescriptionTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#departmentSave').on('click',function(){
    var department = $('#department').val();

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
            $.ajax({
                url: '/maintenance/departmentSave',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    department:department
                },
                success: function(data){
                    if(data == 'true'){
                        $('#saveDepartmentModal').modal('hide');
                        Swal.fire({
                            title: 'DEPARTMENT ADDED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){departmentTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#saveDepartmentModal').modal('hide');
                        Swal.fire({
                            title: 'SAVE FAILED',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){departmentTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});