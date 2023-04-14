function togglePassword(){
    var password = document.getElementById('password');
    var showPassword = document.getElementById('showPassword');

    if(password.type == "password"){
        password.type = "text";
    }
    else{
        password.type = "password";
    }
}

$("#show_pass").change(function(){
    if($("#show_pass").is(":checked")){
        $('#password').attr('type', 'text');
    }
    else{
        $('#password').attr('type', 'password');
    }
});