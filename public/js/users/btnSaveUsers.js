//Save User Form
$('#btnUserSave').on('click',function(){
    var user_level = $('#user_level').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var status = $('#status').val();
    var password = $('#password').val();
    var confirm = $('#confirm').val();

    if(user_level && name && email && status && password && confirm){
        if(password != confirm){
            Swal.fire("ERROR","Password does not match!","error");
            return false;
        }
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
                    url: '/users/saveUser',
                    type: "POST",
                    headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        user_level:user_level,
                        name:name,
                        email:email,
                        status:status,
                        password:password
                    },
                    success: function(data){
                        if(data == 'true'){
                            $('#usersModal').modal('hide');
                            Swal.fire("USER ADD SUCCESSFULLY","","success");
                            setTimeout(function(){window.location.reload()}, 2000);
                        }
                        else if(data == 'duplicate'){
                            Swal.fire("DUPLICATE EMAIL", "Email address already exists!", "error");
                            return false;
                        }
                        else{
                            $('#usersModal').modal('hide');
                            Swal.fire("SAVE FAILED", "New user save failed!", "error");
                            setTimeout(function(){window.location.reload()}, 2000);
                        }
                    },
                    error: function(data){
                      if(data.status == 401){
                          window.location.reload();
                      }
                      alert(data.responseText);
                    }
                });
            }
        });   
    }
    else{
        Swal.fire("REQUIRED", "Please fill all required fields!", "error");
    }
});