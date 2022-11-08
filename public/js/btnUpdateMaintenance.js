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
                        Swal.fire("COMPANY UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){companyTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("DUPLICATE COMPANY NAME","","error");
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
                        Swal.fire("COMPANY UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){branchTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("DUPLICATE BRANCH NAME","","error");
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
                        Swal.fire("COMPANY UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("DUPLICATE SUPERVISOR NAME","","error");
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
                        Swal.fire("COMPANY UPDATED SUCCESSFULLY","","success");
                        setTimeout(function(){supervisorTable.ajax.reload();}, 2000);
                    }
                    else if(data == 'duplicate'){
                        Swal.fire("DUPLICATE SUPERVISOR NAME","","error");
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
