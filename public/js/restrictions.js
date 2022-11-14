//Cellphone Number Format
  function phoneFormat(input) {//returns (##) ####-####
      input = input.replace(/\D/g,'');
      var size = input.length;
      if (size>0) {input="("+input}
      if (size>3) {input=input.slice(0,3)+") "+input.slice(3,12)}
      if (size>6) {input=input.slice(0,9)+"-" +input.slice(9)}
      return input;
  }

//Email Format Validation Function
  var email_address = document.querySelector("#email_address");
  var email_validation = document.querySelector("#email_validation");
  let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; //

  function emailValidation(){
      if(email_address.value.match(regExp)){
          $('#email_validation').hide();
          // $('#btnSave').prop("disabled",false);
      }
      else{
          $('#email_validation').show();
          // $('#btnSave').prop("disabled",true);
      }
  }

  //Employee Email Format Validation Function
  var employee_email_address = document.querySelector("#employee_email_address");
  var employee_email_validation = document.querySelector("#employee_email_validation");
  let regExpr = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  function employeeEmailValidation(){
      if(employee_email_address.value.match(regExpr)){
        $('#employee_email_validation').hide();
        // $('#btnSave').prop("disabled",false);
      }
      else{
        $('#employee_email_validation').show();
        // $('#btnSave').prop("disabled",true);
      }
  }

  //Input(Letters Only) Function
      function lettersOnly(input){
        var letters_only = /[^- ñ a-z]/gi;//Everything (^) //Uppercase allowed (i) //Global (g)
            input.value = input.value.replace(letters_only,"");
      }

      function firstNameField(input){
        var firstnameField = /[^- ñ a-z 0-9]/gi;//Everything (^) //Uppercase allowed (i) //Global (g)
            input.value = input.value.replace(firstnameField,"");
      }

  //Input(Numbers Only) Function
      function numbersOnly(input){
        var numbers_only = /[^- 0-9]/g;
          input.value = input.value.replace(numbers_only,"");
      }

      function salaryField(input){
        var salary_only = /[^- ₱ , 0-9]/g;
          input.value = input.value.replace(salary_only,"");
      }
  //Input(Contact Number Only) Function
      function contactNumberOnly(input){
        var contact_number = /[^ +()0-9]/g;
          input.value = input.value.replace(contact_number,"");
      }

  //Prevent Enter key for submitting the form
      $('.required_field').keypress(function(e){
        if ( e.which == 13 ) return false;
        //or...
        if ( e.which == 13 ) e.preventDefault();
      });

      $('.optional').keypress(function(e){
        if ( e.which == 13 ) return false;
        //or...
        if ( e.which == 13 ) e.preventDefault();
      });

      $('.multiple_field').keypress(function(e){
        if ( e.which == 13 ) return false;
        //or...
        if ( e.which == 13 ) e.preventDefault();
      });

  //Prevent delete the value inside input field
    // function ValidateInput(ctrl) {
    //     if (event.keyCode == 8 ||event.keyCode == 46) {   //backspace pressed or delete key pressed
    //         //check whether the user is trying to delete the fixed text
    //         if (ctrl.selectionStart <= 5) 
    //         return false;
    //     }
    //         return true;
    // }
  //Prevent space bar
    function keyDown(e) { 
      var e = window.event || e;
      var key = e.keyCode;
      //space pressed
        if (key == 32) { //space
        e.preventDefault();
        }
              
    }