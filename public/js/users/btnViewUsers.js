//Fetch User Data
$('#usersTable tbody').on('click','tr',function(){
    var table = $('table.usersTable').DataTable();
    var data = table.row(this).data();
    var id = data.id;

    $('#user_id').val(data.id);
    $('#user_level').val(data.user_level);
    $('#name').val(data.name);
    $('#email').val(data.email);

    $('.modal-title').html('<i class="fas fa-user-edit"></i> UPDATE USER');

    $('.span_user_level').hide();
    $('.span_name').hide();
    $('.span_email').hide();
    $('.password-container').hide();

    $('#btnUserSave').hide();
    $('#btnUserUpdate').show();

    $('#usersModal').modal('show');
});