var usersTable;
$(document).ready(function(){
    usersTable = $('table.usersTable').DataTable({
        dom:'l<"breakspace">trip',
        language:{
            "info": "\"_START_ to _END_ of _TOTAL_ Users\"",
            "lengthMenu":"Show _MENU_ Users",
            "emptyTable":"No Users Data Found!",
            "loadingRecords": "Loading Users Records...",
        },
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax:{
            url: '/users/listOfUsers',
        },
        order: [],
        columns:[
            {data: 'user_level'},
            {data: 'name'},
            {data: 'email'},
            {
                data: 'status',
                "render": function(data, type, row, meta){
                    if(row.status == 'ACTIVE'){
                        return '<label class="switch" style="zoom: 80%; margin-top: -5px; margin-bottom: -10px;"><input type="checkbox" class="togBtn" id="'+ meta.row +'" checked><div class="slider round"><span style="font-size: 110%;" class="on">ACTIVE</span><span style="font-size: 15px;" class="off">INACTIVE</span></div></label>';
                    }
                    if(row.status == 'INACTIVE'){
                        return '<label class="switch" style="zoom: 80%; margin-top: -5px; margin-bottom: -10px;"><input type="checkbox" class="togBtn" id="'+ meta.row +'"><div class="slider round"><span style="font-size: 110%;" class="on">ACTIVE</span><span style="font-size: 15px;" class="off">INACTIVE</span></div></label>';
                    }
                },
                width: '70px'
            }
        ],
        initComplete: function(){
            $('#loading').hide();
            $('#status_filter').val('');
        }
    });
    $('div.breakspace').html('<br><br>');

    $(document).on('change', '.togBtn', function(){
        var id = $(this).attr("id");
        var data = usersTable.row(id).data();
            if($(this).is(':checked')){
                var status = 'ACTIVE';
            }
            else{
                var status = 'INACTIVE';
            }
            $.ajax({
                url: '/users/status',
                data:{
                    id: data.id,
                    name: data.name,
                    user_level: data.user_level,
                    status: status
                },
                success: function(data){
                    setTimeout(function(){usersTable.ajax.reload(null, false)}, 1000);
                }
            });
    });
    $('div.breakspace').html('<br><br>');
});

$('.filter-input').on('keyup search', function(){
    usersTable.column($(this).data('column')).search($(this).val()).draw();
});

$('.filter-select').on('change', function(){
    usersTable.column($(this).data('column')).search(!$(this).val()?'':'^'+$(this).val()+'$',true,false,true).draw();
});

$('#addUserBtn').on('click',function(){
    if(current_email == 'Y'){
        addUserBtn();
        $('#usersModal').modal('show');
    }
    else{
        Swal.fire({
            title: "EMAIL SERVER UNAVAILABLE",
            html: "Email server is temporarily down. <br>Please contact administrator.",
            icon: "error"
        });
    }
});

function addUserBtn(){
    $('#user_level').val('');
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
    $('#confirm').val('');
    $('#status').val('');
    $('#usersModal').modal('show');
    $('.modal-title').html('<i class="fas fa-user-plus"></i> ADD NEW USER');
    $('#btnUserSave').show();
    $('#btnUserUpdate').hide();
}

function lettersOnly(input){
    var letters_only = /[^- ñ a-z]/gi;
      input.value = input.value.replace(letters_only,"");
}

const email = document.querySelector("#email");
const email_validation = document.querySelector("#email_validation");
let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

function emailValidation(){
    if(email.value.match(regExp)){
        $('#email_validation').hide();
        $('#email').css('border-color','#0d1a80');
    }
    else{
        $('#email_validation').show();
        $('#email').css('border-color','#dc3545');
    }
}

setInterval(checkclearform,0);
function checkclearform(){
    if($('.required_field').filter(function(){ return !!this.value; }).length < 1){
        $('#btnUserClear').prop("disabled",true);
    }
    else{
        $('#btnUserClear').prop("disabled",false);
    }
}

$('#btnUserClear').on('click',function(){
    Swal.fire({
        title: 'Do you want to clear the form?',
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
    }).then((clear) => {
        if(clear.isConfirmed){
            $('#user_level').val('');
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
            $('#confirm').val('');
            $('#status').val('');
        }
        else if(clear.isDenied){
        }
    });
});
