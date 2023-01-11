<div class="modal fade in" id="changePassword">
    <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content card">
        <div class="modal-header text-center" style="border-radius: 0px; background-color: #0d1a80; color: white; height: 45px;">
            <h6 class="modal-title w-100">CHANGE PASSWORD</h6>
            <button type="button" class="btn-close btn-close-white close closePassword" data-bs-dismiss="modal" data-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="background-color: white; color: black;">
            <div class="alert alert-primary requiredNote p-2" role="alert" style="display: none;">
                <i class='fa fa-exclamation-triangle'></i>
                <b>NOTE:</b> Please fill up all fields.
            </div>
            <form id="form_changepassword">
                <div class="mb-3">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="password" id="pass1" name="pass1" minlength="8" maxlength="30" placeholder=" " required autofocus>
                        <label class="formlabel form-label" for="pass1">Enter Current Password</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="password" id="pass2" name="pass2" minlength="8" maxlength="30" placeholder=" " required>
                        <label class="formlabel form-label" for="pass2">Enter New Password</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="password" id="pass3" name="pass3" minlength="8" maxlength="30" placeholder=" " required>
                        <label class="formlabel form-label" for="pass3">Re-Enter New Password</label>
                    </div>
                </div>
                <div style="zoom: 85%;">
                    <button type="reset" id="btnResetChange" class="btn btn-primary bp" onclick="$('#pass1').focus();">CLEAR</button>
                    <button type="button" id="btnChangePassword" class="btn btn-primary float-end bp btnRequired">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<script>
    $('#lblChangePassword').on('click', function(){
    $('#pass1').val('');
    $('#pass2').val('');
    $('#pass3').val('');
    $('#changePassword').modal('show');
});

$('#btnChangePassword').on('click', function(){
    var pass1 = $('#pass1').val();
    var pass2 = $('#pass2').val();
    var pass3 = $('#pass3').val();
    if(pass1 == "" || pass2 == "" || pass3 == ""){
        $('#form_changepassword')[0].reportValidity();
        return false;
    }
    else if(pass1.length < 8 || pass2.length < 8 || pass3.length < 8){
        $('#form_changepassword')[0].reportValidity();
        return false;
    }
    else{
        if(pass2 != pass3){
            Swal.fire('NEW PASSWORD MISMATCH','The password confirmation does not match!','error');
            return false;
        }
        else{
            $.ajax({
                url: "/change/validate",
                data:{
                    current: pass1
                },
                success: function(data){
                    if(data == 'true'){
                        Swal.fire({
                            title: "CHANGE PASSWORD?",
                            html: "You are about to CHANGE your current user account password!",
                            icon: "warning",
                            showCancelButton: true,
                            cancelButtonColor: '#3085d6',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Confirm',
                            allowOutsideClick: false
                        })
                        .then((result) => {
                            if(result.isConfirmed){
                                $.ajax({
                                    url: "/change/password",
                                    data:{
                                        new: pass2
                                    },
                                    success: function(data){
                                        if(data == 'true'){
                                            $('.closePassword').click();
                                            Swal.fire("UPDATE SUCCESS", "User changed password successfully!", "success");
                                            return true;
                                        }
                                        else{
                                            Swal.fire("UPDATE FAILED", "User password change failed!", "error");
                                            return true;
                                        }
                                    }
                                });
                            }
                        });
                    }
                    else{
                        Swal.fire('INCORRECT','Incorrect Current Password!', 'error');
                        return false;
                    }
                }
            });
        }
    }
});
</script>