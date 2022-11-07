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
                        Swal.fire("COMPANY ADDED SUCCESSFULLY","","success");
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
                        Swal.fire("COMPANY ADDED SUCCESSFULLY","","success");
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
                        // Swal.fire("COMPANY ADDED SUCCESSFULLY","","success");
                        // setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                    // else if(data == 'duplicate'){
                    //     Swal.fire("SUPERVISOR NAME ALREADY EXIST","Please Enter Different Supervisor Name","error");
                    //     $('#supervisor_name').val('');
                    //     return false;
                    // }
                    else{
                        $('#saveShiftModal').modal('hide');
                        // Swal.fire("SAVE FAILED", "", "error");
                        // setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});