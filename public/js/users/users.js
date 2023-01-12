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
            {data: 'user_level'},//data column name
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

$('#addUserBtn').on('click',function(){
    $('#user_level').val('');
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
    $('#confirm').val('');
    $('#status').val('');
    $('#usersModal').modal('show');
    // $('#addUserModal').modal('show');
    $('.modal-title').html('<i class="fas fa-user-plus"></i> ADD NEW USER');
    $('#btnUserSave').show();
    $('#btnUserUpdate').hide();
});

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