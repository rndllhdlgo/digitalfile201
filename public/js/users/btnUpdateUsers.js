//Update User Data
$('#btnUserUpdate').on('click',function(){
    var id = $('#user_id').val();
    var user_level = $('#user_level').val();
    var name = $('#name').val();
    var email = $('#email').val();

    Swal.fire({
        title:'Do you want to update details?',
        allowOutsideClick : false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((update) =>{
        if(update.isConfirmed){
            $('#loading').show();
            $.ajax({
                url: "/users/updateUser",
                type:"POST",
                headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//For anti forgery
                },
                data:{
                    id:id,
                    user_level:user_level,
                    name:name,
                    email:email
                },
                success: function(data){
                    $('#loading').hide();
                    if(data == 'true'){
                        $('#usersModal').modal('hide');
                        Swal.fire("EDIT SUCCESS","","success");
                        setTimeout(function(){$('#usersTable').DataTable().ajax.reload();}, 2000);
                    }
                    else{
                        $('#usersModal').modal('hide');
                        Swal.fire("EDIT FAILED","","error");
                        setTimeout(function(){$('#usersTable').DataTable().ajax.reload();}, 2000);
                    }  
                }
            });
        }
        else if (update.isDenied) {
            Swal.fire("EDIT CANCELLED"," ","error");
        }
    });
});