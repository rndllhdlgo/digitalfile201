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
                        $('#updateCompanyModal').modal('hide');
                        Swal.fire({
                            title:'COMPANY NAME UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
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
                        $('#updateBranchModal').modal('hide');
                        Swal.fire({
                            title:'BRANCH NAME UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
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
                        $('#updateSupervisorModal').modal('hide');
                        Swal.fire({
                            title:'SUPERVISOR NAME UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
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
                        Swal.fire({
                            title:'SHIFT UPDATED SUCCESSFULLY',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
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

// $('#jobPositionUpdate').on('click',function(){
//     var job_position_name_id = $('#job_position_name_id').val();
//     var job_position_name_orig = $('#job_position_name').val();
//     var job_position_name_new = $('#job_details_position_name').val();

//     Swal.fire({
//         title: 'Do you want to save changes?',
//         allowOutsideClick: false,
//         allowEscapeKey: false,
//         showDenyButton: true,
//         confirmButtonText: 'Yes',
//         denyButtonText: 'No',
//         customClass: {
//         actions: 'my-actions',
//         confirmButton: 'order-2',
//         denyButton: 'order-3',
//         }
//     }).then((save) => {
//         if(save.isConfirmed){
//             $.ajax({
//                 url: '/maintenance/jobPositionUpdate',
//                 type: "POST",
//                 headers:{
//                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 },
//                 data:{
//                     job_position_name_id:job_position_name_id,
//                     job_position_name_orig:job_position_name_orig,
//                     job_position_name_new:job_position_name_new
//                 },
//                 success: function(data){
//                     if(data == 'true'){
//                         $('#updateJobPositionModal').modal('hide');
//                         Swal.fire({
//                             title:'JOB POSITION UPDATED SUCCESSFULLY',
//                             icon: 'success',
//                             showConfirmButton: false,
//                             timer: 1500
//                         });
//                         setTimeout(function(){jobPositionTable.ajax.reload();}, 2000);
//                     }
//                     else if(data == 'duplicate'){
//                         Swal.fire("JOB POSITION NAME ALREADY EXIST!","Please enter different Job Position Name","error");
//                         return false;
//                     }
//                     else{
//                         $('#updateJobPositionModal').modal('hide');
//                         // Swal.fire("UPDATE FAILED", "", "error");
//                         setTimeout(function(){jobPositionTable.ajax.reload();}, 2000);
//                     }
//                 }
//             });
//         }
//     }); 
// });


// $('#jobDescriptionUpdate').on('click',function(){
//     var job_description_id = $('#job_description_id').val();
//     var job_description_orig = $('#job_description').val();
//     var job_description_new = $('#job_details_description').val();

//     Swal.fire({
//         title: 'Do you want to save changes?',
//         allowOutsideClick: false,
//         allowEscapeKey: false,
//         showDenyButton: true,
//         confirmButtonText: 'Yes',
//         denyButtonText: 'No',
//         customClass: {
//         actions: 'my-actions',
//         confirmButton: 'order-2',
//         denyButton: 'order-3',
//         }
//     }).then((save) => {
//         if(save.isConfirmed){
//             $.ajax({
//                 url: '/maintenance/jobDescriptionUpdate',
//                 type: "POST",
//                 headers:{
//                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 },
//                 data:{
//                     job_description_id:job_description_id,
//                     job_description_orig:job_description_orig,
//                     job_description_new:job_description_new
//                 },
//                 success: function(data){
//                     if(data == 'true'){
//                         $('#updateJobDescriptionModal').modal('hide');
//                         Swal.fire({
//                             title:'JOB DESCRIPTION UPDATED SUCCESSFULLY',
//                             icon: 'success',
//                             showConfirmButton: false,
//                             timer: 1500
//                         });
//                         setTimeout(function(){jobDescriptionTable.ajax.reload();}, 2000);
//                     }
//                     else{
//                         $('#updateJobDescriptionModal').modal('hide');
//                         // Swal.fire("UPDATE FAILED", "", "error");
//                         setTimeout(function(){jobDescriptionTable.ajax.reload();}, 2000);
//                     }
//                 }
//             });
//         }
//     }); 
// });

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
                        $('#updateJobPositionAndDescriptionModal').modal('hide');
                        // Swal.fire("UPDATE FAILED", "", "error");
                        setTimeout(function(){jobPositionAndDescriptionTable.ajax.reload();}, 2000);
                    }
                }
            });
        }
    }); 
});



