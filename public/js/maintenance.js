$('#company_tab').addClass('tabactive');

$('#company_tab').on('click',function(){
    $('#company_tab').addClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company_div').fadeIn();
    $('#branch').hide();
    $('#shift').hide();
    $('#position').hide();
    $('#supervisor').hide();

    $('#addCompanyBtn').show();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addPositionBtn').hide();
    $('#addSupervisorBtn').hide();
});

$('#branch_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').addClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company_div').hide();
    $('#branch').show();
    $('#shift').hide();
    $('#position').hide();
    $('#supervisor').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').show();
    $('#addShiftBtn').hide();
    $('#addPositionBtn').hide();
    $('#addSupervisorBtn').hide();
});

$('#shift_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').addClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company_div').hide();
    $('#branch').hide();
    $('#shift').show();
    $('#position').hide();
    $('#supervisor').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').show();
    $('#addPositionBtn').hide();
    $('#addSupervisorBtn').hide();
});

$('#position_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').addClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company_div').hide();
    $('#branch').hide();
    $('#shift').hide();
    $('#position').show();
    $('#supervisor').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addPositionBtn').show();
    $('#addSupervisorBtn').hide();
});

$('#supervisor_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').addClass('tabactive');
    $('#company_div').hide();
    $('#branch').hide();
    $('#shift').hide();
    $('#position').hide();
    $('#supervisor').show();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addPositionBtn').hide();
    $('#addSupervisorBtn').show();
});

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
                        Swal.fire("DUPLICATE COMPANY NAME","","error");
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

$('#companyUpdate').on('click',function(){
    var company_id = $('#company_id').val();
    var company_orig = $('#company').val();
    var company_new = $('#company_details').val();

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


var companyTable = $('#companyTable').DataTable({
    dom:'lf<"breakspace">rtip',
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/companyData',
    },
    columns: [
        {data: 'company'}
    ] 
});
$('div.breakspace').html('<br><br>');



$('#companyTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = companyTable.row(this).data();

    $('#company_id').val(data.id);
    $('#company').val(data.company);
    $('#company_details').val(data.company);

    $('#updateCompanyModal').modal('show');
});


setInterval(companyCheck,0);
function companyCheck(){
    if($('#saveCompanyModal').is(":visible")){
        if(!$('#company').val()){
            $('#companySave').prop('disabled',true);
        }
        else{
            $('#companySave').prop('disabled',false);
        }
    }

    if($('#updateCompanyModal').is(":visible")){
        if($('#company').val() == $('#company_details').val() || !$('#company_details').val()){
            $('#companyUpdate').prop('disabled',true);
        }
        else{
            $('#companyUpdate').prop('disabled',false);
        }
    }
}

$('#addCompanyBtn').on('click',function(){
    $('#saveCompanyModal').modal('show');
});