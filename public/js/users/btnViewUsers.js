$('#usersTable tbody').on('click','tr td:not(:nth-child(4))',function(){
    var table = $('table.usersTable').DataTable();
    var data = table.row(this).data();
    var id = data.id;

    $('#user_id').val(data.id);
    $('#user_level').val(data.user_level);
    $('#user_level_orig').val(data.user_level);
    $('#name_orig').val(data.name);
    $('#name').val(data.name);
    $('#email_orig').val(data.email);
    $('#email').val(data.email);
    $('#status').val(data.status);

    $('.modal-title').html('<i class="fas fa-user-edit"></i> UPDATE USER');

    $('.span_user_level').hide();
    $('.span_name').hide();
    $('.span_email').hide();
    $('.span_status').hide();

    $('#btnUserSave').hide();
    $('#btnUserUpdate').show();
    $('#usersModal').modal('show');
});

// //Fetch User Data
// $('#userTable tbody').on('click', 'tr td:not(:nth-child(4))', function(){
//     var table = $('table.usersTable').DataTable();
//     var data = table.row(this).data();
//     var id = data.id;

//     $('#user_id').val(data.id);
//     $('#user_level').val(data.user_level);
//     $('#name').val(data.name);
//     $('#email').val(data.email);

//     $('.modal-title').html('<i class="fas fa-user-edit"></i> UPDATE USER');

//     $('.span_user_level').hide();
//     $('.span_name').hide();
//     $('.span_email').hide();
//     $('.password-container').hide();

//     $('#btnUserSave').hide();
//     $('#btnUserUpdate').show();

//     $('#usersModal').modal('show');
// });