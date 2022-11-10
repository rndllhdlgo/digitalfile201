$('#companyUpdate').on('click',function(){
    var company_id = $('#company_id').val();
    var company_orig = $('#company').val();
    var company_new = $('#company_details').val();

    Swal.fire({
        title: 'Do you want to update changes?',
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
                url: '/maintenance/companyUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    company_id:company_id,
                    company_orig:company_orig,
                    company_new:company_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#updateCompanyModal').modal('hide');
                        Swal.fire("COMPANY NAME UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("COMPANY NAME ALREADY EXIST!","Please enter different Company Name","error");
                        return false;
                    }
                    else{
                        $('#updateCompanyModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#branchUpdate').on('click',function(){
    var branch_id = $('#branch_id').val();
    var branch_orig = $('#branch_name').val();
    var branch_new = $('#branch_details').val();

    Swal.fire({
        title: 'Do you want to update changes?',
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
                url: '/maintenance/branchUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    branch_id:branch_id,
                    branch_orig:branch_orig,
                    branch_new:branch_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#updateBranchModal').modal('hide');
                        Swal.fire("BRANCH NAME UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){branchTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("BRANCH NAME ALREADY EXIST!","Please enter different Branch Name","error");
                        return false;
                    }
                    else{
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
    var supervisor_orig = $('#supervisor_name').val();
    var supervisor_new = $('#supervisor_details').val();

    Swal.fire({
        title: 'Do you want to update changes?',
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
                url: '/maintenance/supervisorUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    supervisor_id:supervisor_id,
                    supervisor_orig:supervisor_orig,
                    supervisor_new:supervisor_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#updateSupervisorModal').modal('hide');
                        Swal.fire("SUPERVISOR NAME UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("SUPERVISOR NAME ALREADY EXIST!","Please enter different Supervisor Name","error");
                        return false;
                    }
                    else{
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
        title: 'Do you want to update changes?',
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
                        $('#updateShiftModal').modal('hide');
                        Swal.fire("SHIFT UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){shiftTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("SHIFT CODE ALREADY EXIST!","Please enter different Shift Code","error");
                        return false;
                    }
                    else{
                        $('#updateShiftModal').modal('hide');
                        Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){shiftTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#jobPositionUpdate').on('click',function(){
    var job_position_name_id = $('#job_position_name_id').val();
    var job_position_name_orig = $('#job_position_name').val();
    var job_position_name_new = $('#job_details_position_name').val();

    Swal.fire({
        title: 'Do you want to update changes?',
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
                url: '/maintenance/jobPositionUpdate',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    job_position_name_id:job_position_name_id,
                    job_position_name_orig:job_position_name_orig,
                    job_position_name_new:job_position_name_new
                },
                success: function(data){
                    if(data == 'true'){
                        $('#updateJobPositionModal').modal('hide');
                        // Swal.fire("SHIFT UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){jobPositionTable.ajax.reload();}, 2000);
                    }
                    // else if(data == 'duplicate'){
                    //     Swal.fire("SHIFT CODE ALREADY EXIST!","Please enter different Shift Code","error");
                    //     return false;
                    // }
                    else{
                        $('#updateJobPositionModal').modal('hide');
                        // Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){jobPositionTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

