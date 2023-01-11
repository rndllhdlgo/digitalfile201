
// $(document).ready(function () {
//     var table = $('#usersTable').DataTable({
//         paging: false,
//         dom:'lrtip',//layout of the table
//         language: {
//             "info": "\"_START_ to _END_ of _TOTAL_ Users\"",
//             "lengthMenu":"Show _MENU_ Users",
//             "emptyTable":"No Users data found!"
//         },
//         processing:true,//loading processing
//         serverSide:false,//Source of data
//         scrollX: true,//Horizontal Scroll
//         ajax: {
//             url: '/users/listOfUsers',//route-name/To Display data in JSON format
//         },
//         columns: [
//             {data: 'user_level'},//data column name
//             {data: 'name'},
//             {data: 'email'},
//             {data: 'status'}
//         ],
//     });
 
//     $('a.toggle-vis').on('click', function (e) {
//         e.preventDefault();
 
//         // Get the column API object
//         var column = table.column($(this).attr('data-column'));
 
//         // Toggle the visibility
//         column.visible(!column.visible());
//     });
//     setTimeout(function(){$('#usersTable').DataTable().ajax.reload();}, 0);
// });

//Add User
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
    $('.password-container').show();
});

//Show Password
function togglePassword(){
    var password = $('#password')[0];
    var confirm = $('#confirm')[0];
    var showPassword = $('#showPassword')[0];

    if(password.type == "password"){
        password.type = "text";
    }
    else{
        password.type = "password";
    }
    if(confirm.type == "password"){
        confirm.type = "text";
    }
    else{
        confirm.type = "password";
    }
}


//Input(Letters Only)
function lettersOnly(input){
    var letters_only = /[^- ñ a-z]/gi;//Everything (^) //Uppercase allowed (i) //Global (g)
      input.value = input.value.replace(letters_only,"");
  }

//Email Validation
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

//Required Fields
// setInterval(checkforblank,0);
// function checkforblank(){
//     if($('.required_field').filter(function(){ return !!this.value; }).length != 6 || $('#email_validation').is(":visible")){
//         $('#btnUserSave').prop("disabled",true);
//     }
//     else{
//         $('#btnUserSave').prop("disabled",false);
//     }
// }
//Clear Field
setInterval(checkclearform,0);
function checkclearform(){
    if($('.required_field').filter(function(){ return !!this.value; }).length < 1){
        $('#btnUserClear').prop("disabled",true);
    }
    else{
        $('#btnUserClear').prop("disabled",false);
    }
}

