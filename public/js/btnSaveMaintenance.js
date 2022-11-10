$('#companySave').on('click',function(){
    var company = $('#company').val();

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
                    company:company
                },
                success: function(data){
                    if(data == 'true'){
                        $('#saveCompanyModal').modal('hide');
                        Swal.fire("COMPANY ADDED SUCCESSFULLY","","success");
                        setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("COMPANY NAME ALREADY EXIST","Please Enter Different Company Name","error");
                        return false;
                    }
                    else{
                        $('#saveCompanyModal').modal('hide');
                        Swal.fire("SAVE FAILED", "", "error");
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
                        Swal.fire("BRANCH ADDED SUCCESSFULLY","","success");
                        setTimeout(function(){branchTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("BRANCH NAME ALREADY EXIST","Please Enter Different Branch Name","error");
                        $('#branch_name').val('');
                        return false;
                    }
                    else{
                        $('#saveBranchModal').modal('hide');
                        Swal.fire("SAVE FAILED", "", "error");
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
                        Swal.fire("SUPERVISOR ADDED SUCCESSFULLY","","success");
                        setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("SUPERVISOR NAME ALREADY EXIST","Please Enter Different Supervisor Name","error");
                        $('#supervisor_name').val('');
                        return false;
                    }
                    else{
                        $('#saveSupervisorModal').modal('hide');
                        Swal.fire("SAVE FAILED", "", "error");
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
                        Swal.fire("SHIFT ADDED SUCCESSFULLY","","success");
                        setTimeout(function(){shiftTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("SHIFT CODE ALREADY EXIST","Please Enter Different Shift Code","error");
                        $('#shift_code').val('');
                        return false;
                    }
                    else{
                        $('#saveShiftModal').modal('hide');
                        Swal.fire("SAVE FAILED", "", "error");
                        setTimeout(function(){shiftTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});

$('#jobPositionSave').on('click',function(){
    var job_position_name = $('#job_position_name').val();

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
                url: '/maintenance/jobPositionSave',
                type: "POST",
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    job_position_name:job_position_name
                },
                success: function(data){
                    if(data.result == 'true'){
                        $('#savePositionModal').modal('hide');
                        $('#job_position_id').val(data.id);
                        var jobDescriptionTable = $('#job_description_data_table').DataTable({
                            dom:'t',
                        });
                        var jobDescription_data  = jobDescriptionTable.rows().data();
                        $.each(jobDescription_data, function(key, value){
                            $.ajax({
                                type: 'POST',
                                url: '/maintenance/jobDescriptionSave',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    'job_position_id': data.id,
                                    'job_description': value[1]
                                },
                            });
                        });
                        // Swal.fire("COMPANY ADDED SUCCESSFULLY","","success");
                        setTimeout(function(){jobPositionTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("JOB POSITION NAME ALREADY EXIST","Please enter different Job Position Name","error");
                        return false;
                    }
                    else{
                        $('#savePositionModal').modal('hide');
                        // Swal.fire("SAVE FAILED", "", "error");
                        // setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});