$('#addUserBtn').on('click',function(){
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