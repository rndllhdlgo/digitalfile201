$('#btnUserSave').on('click',function(){
    var user_level = $('#user_level').val();
    var name = $('#name').val();
    var email = $('#email').val();

    if(user_level && name && email){
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
                $('#loading').show();
                $.ajax({
                    url: '/users/saveUser',
                    type: "POST",
                    headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        user_level:user_level,
                        name:name,
                        email:email
                    },
                    success: function(data){
                        $('#loading').hide();
                        if(data == 'true'){
                            $('#usersModal').modal('hide');
                            Swal.fire("USER ADD SUCCESSFULLY","","success");
                            setTimeout(function(){$('#usersTable').DataTable().reload()}, 2000);
                        }
                        else if(data == 'duplicate_email'){
                            Swal.fire("DUPLICATE EMAIL", "Email address already exists!", "error");
                            return false;
                        }
                        else{
                            $('#usersModal').modal('hide');
                            Swal.fire("SAVE FAILED", "New user save failed!", "error");
                            setTimeout(function(){$('#usersTable').DataTable().reload()}, 2000);
                        }
                    },
                });
            }
        });
    }
    else{
        Swal.fire("REQUIRED", "Please fill all required fields!", "error");
    }
});