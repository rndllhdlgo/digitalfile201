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