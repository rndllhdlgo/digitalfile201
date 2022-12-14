$('#companyUpdate').on('click',function(){
    var company_id = $('#company_id').val();
    var company_name_orig = $('#company_name').val();
    var company_name_new = $('#company_name_new').val();

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
                url: '/maintenance/companyUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    company_id:company_id,
                    company_name_orig:company_name_orig,
                    company_name_new:company_name_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#updateCompanyModal').modal('hide');
                        Swal.fire({
                            title:'COMPANY NAME UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#loading').hide();
                        $('#updateCompanyModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#departmentUpdate').on('click',function(){
    var department_id = $('#department_id').val();
    var department_orig = $('#department').val();
    var department_new = $('#department_new').val();

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
                url: '/maintenance/departmentUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    department_id:department_id,
                    department_orig:department_orig,
                    department_new:department_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#updateDepartmentModal').modal('hide');
                        Swal.fire({
                            title:'DEPARTMENT UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){departmentTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#loading').hide();
                        $('#updateDepartmentModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){departmentTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#branchUpdate').on('click',function(){
    var branch_id = $('#branch_id').val();
    var branch_name_orig = $('#branch_name').val();
    var branch_name_new = $('#branch_name_new').val();

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
                url: '/maintenance/branchUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    branch_id:branch_id,
                    branch_name_orig:branch_name_orig,
                    branch_name_new:branch_name_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#updateBranchModal').modal('hide');
                        Swal.fire({
                            title:'BRANCH NAME UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){branchTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#loading').hide();
                        $('#updateBranchModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){branchTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});


$('#supervisorUpdate').on('click',function(){
    var supervisor_id = $('#supervisor_id').val();
    var supervisor_name_orig = $('#supervisor_name').val();
    var supervisor_name_new = $('#supervisor_name_new').val();

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
                url: '/maintenance/supervisorUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    supervisor_id:supervisor_id,
                    supervisor_name_orig:supervisor_name_orig,
                    supervisor_name_new:supervisor_name_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#updateSupervisorModal').modal('hide');
                        Swal.fire({
                            title:'SUPERVISOR NAME UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#loading').hide();
                        $('#updateSupervisorModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#shiftUpdate').on('click',function(){
    var shift_id = $('#shift_id').val();
    var shift_code_orig = $('#shift_code').val();
    var shift_code_new = $('#shift_details_code').val();

    var shift_working_hours_orig = $('#shift_working_hours').val();
    var shift_working_hours_new = $('#shift_details_working_hours').val();

    var shift_break_time_orig = $('#shift_break_time').val();
    var shift_break_time_new = $('#shift_details_break_time').val();

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
                url: '/maintenance/shiftUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    shift_id:shift_id,
                    shift_code_orig:shift_code_orig,
                    shift_code_new:shift_code_new,
                    shift_working_hours_orig:shift_working_hours_orig,
                    shift_working_hours_new:shift_working_hours_new,
                    shift_break_time_orig:shift_break_time_orig,
                    shift_break_time_new:shift_break_time_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#updateShiftModal').modal('hide');
                        Swal.fire({
                            title:'SHIFT UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){shiftTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#loading').hide();
                        $('#updateShiftModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){shiftTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#jobPositionAndDescriptionUpdate').on('click',function(){
    var job_position_and_description_id = $('#job_position_and_description_id').val();
    var job_position_name_orig = $('#job_position_name').val();
    var job_position_name_new = $('#job_position_name_new').val();
    var job_description_orig = $('#job_description').val();
    var job_description_new = $('#job_description_new').val();
    var job_requirements_orig = $('#job_requirements').val();
    var job_requirements_new = $('#job_requirements_new').val();

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
                url: '/maintenance/jobPositionAndDescriptionUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    job_position_and_description_id:job_position_and_description_id,
                    job_position_name_orig:job_position_name_orig,
                    job_position_name_new:job_position_name_new,
                    job_description_orig:job_description_orig,
                    job_description_new:job_description_new,
                    job_requirements_orig:job_requirements_orig,
                    job_requirements_new:job_requirements_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#loading').hide();
                        $('#updateJobPositionAndDescriptionModal').modal('hide');
                        Swal.fire({
                            title:'JOB DESCRIPTION UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){jobPositionAndDescriptionTable.ajax.reload();}, 2000);
                    }
                    else{
                        $('#loading').show();
                        $('#updateJobPositionAndDescriptionModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){jobPositionAndDescriptionTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});



