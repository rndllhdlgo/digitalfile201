// Upload Validation
//Display Image and Validation
function ImageValidation() {
    var fuData = document.getElementById('cover_image');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#image_user').hide();
            $('#image_button').hide();
            $('#image_close').show();
            $('#preview_image').show();
            $('.column-1').addClass('blue');
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
  }
}

//Document Tab Upload Validation
function BirthCertificateValidation() {
    var birthcertData = document.getElementById('birthcertificate_file');
    var birthcertUploadPath = birthcertData.value;
    var birthcertExtension = birthcertUploadPath.substring(birthcertUploadPath.lastIndexOf('.') + 1).toLowerCase();

    //Check if the uploaded is an...

    if (birthcertExtension == "jpg" || birthcertExtension == "jpeg" || birthcertExtension == "png" || birthcertExtension == "gif" || birthcertExtension == "pdf") {
    //To display the uploaded file
        if (birthcertData.files && birthcertData.files[0]) {
            var birthcertReader = new FileReader();
            birthcertReader.onload = function(e) {
                $('#preview_birthcertificate').attr('src', e.target.result);
            }
            birthcertReader.readAsDataURL(birthcertData.files[0]);
            $('#eye_birthcertificate').prop('disabled',false);
            $('#replace_birthcertificate').prop('disabled',false);
            $('#birthcertificate_button').hide();
        }
    }
    else {
        Swal.fire({
            title: 'UNSUPPORTED FILE SELECTED',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif, .pdf)',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
}

function nbiValidation() {
    var nbiData = document.getElementById('nbi_file');
    var nbiUploadPath = nbiData.value;
    var nbiExtension = nbiUploadPath.substring(nbiUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (nbiExtension == "jpg" || nbiExtension == "jpeg" || nbiExtension == "png" || nbiExtension == "gif" || nbiExtension == "pdf") {
        if (nbiData.files && nbiData.files[0]) {
          var nbiReader = new FileReader();
            nbiReader.onload = function(e) {
                $('#preview_nbi').attr('src', e.target.result);
            }
            nbiReader.readAsDataURL(nbiData.files[0]);
            $('#eye_nbi').prop('disabled',false);
            $('#replace_nbi').prop('disabled',false);
            $('#nbi_button').hide();
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif, .pdf)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
  }
}

function barangayclearanceValidation() {
    var barangayClearanceData = document.getElementById('barangay_clearance_file');
    var barangayClearanceUploadPath = barangayClearanceData.value;
    var barangayClearanceExtension = barangayClearanceUploadPath.substring(barangayClearanceUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (barangayClearanceExtension == "jpg" || barangayClearanceExtension == "jpeg" || barangayClearanceExtension == "png" || barangayClearanceExtension == "gif" || barangayClearanceExtension == "pdf") {
        if (barangayClearanceData.files && barangayClearanceData.files[0]) {
          var barangayClearanceReader = new FileReader();
            barangayClearanceReader.onload = function(e) {
                $('#preview_barangay_clearance').attr('src', e.target.result);
            }
            barangayClearanceReader.readAsDataURL(barangayClearanceData.files[0]);
            $('#eye_barangay_clearance').prop('disabled',false);
            $('#replace_barangay_clearance').prop('disabled',false);
            $('#barangay_clearance_button').hide();
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif, .pdf)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
  }
}

function policeclearanceValidation() {
    var policeClearanceData = document.getElementById('police_clearance_file');
    var policeClearanceUploadPath = policeClearanceData.value;
    var policeClearanceExtension = policeClearanceUploadPath.substring(policeClearanceUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (policeClearanceExtension == "jpg" || policeClearanceExtension == "jpeg" || policeClearanceExtension == "png" || policeClearanceExtension == "gif" || policeClearanceExtension == "pdf") {
        if (policeClearanceData.files && policeClearanceData.files[0]) {
          var policeClearanceReader = new FileReader();
            policeClearanceReader.onload = function(e) {
                $('#preview_police_clearance').attr('src', e.target.result);
            }
            policeClearanceReader.readAsDataURL(policeClearanceData.files[0]);
            $('#eye_police_clearance').prop('disabled',false);
            $('#replace_police_clearance').prop('disabled',false);
            $('#police_clearance_button').hide();
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif, .pdf)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
  }
}

function sssValidation() {
    var sssData = document.getElementById('sss_file');
    var sssUploadPath = sssData.value;
    var sssExtension = sssUploadPath.substring(sssUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (sssExtension == "jpg" || sssExtension == "jpeg" || sssExtension == "png" || sssExtension == "gif" || sssExtension == "pdf") {
        if (sssData.files && sssData.files[0]) {
          var sssReader = new FileReader();
            sssReader.onload = function(e) {
                $('#preview_sss').attr('src', e.target.result);
            }
            sssReader.readAsDataURL(sssData.files[0]);
            $('#eye_sss').prop('disabled',false);
            $('#replace_sss').prop('disabled',false);
            $('#sss_button').hide();
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif, .pdf)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
      
  }
}

function philhealthValidation() {
    var philhealthData = document.getElementById('philhealth_file');
    var philhealthUploadPath = philhealthData.value;
    var philhealthExtension = philhealthUploadPath.substring(philhealthUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (philhealthExtension == "jpg" || philhealthExtension == "jpeg" || philhealthExtension == "png" || philhealthExtension == "gif" || philhealthExtension == "pdf") {
        if (philhealthData.files && philhealthData.files[0]) {
          var philhealthReader = new FileReader();
            philhealthReader.onload = function(e) {
                $('#preview_philhealth').attr('src', e.target.result);
            }
            philhealthReader.readAsDataURL(philhealthData.files[0]);
            $('#eye_philhealth').prop('disabled',false);
            $('#replace_philhealth').prop('disabled',false);
            $('#philhealth_button').hide();
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif, .pdf)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
  }
}

function pagibigValidation() {
    var pagibigData = document.getElementById('pag_ibig_file');
    var pagibigUploadPath = pagibigData.value;
    var pagibigExtension = pagibigUploadPath.substring(pagibigUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (pagibigExtension == "jpg" || pagibigExtension == "jpeg" || pagibigExtension == "png" || pagibigExtension == "gif" || pagibigExtension == "pdf") {
        if (pagibigData.files && pagibigData.files[0]) {
          var pagibigReader = new FileReader();
            pagibigReader.onload = function(e) {
                $('#preview_pag_ibig').attr('src', e.target.result);
            }
            pagibigReader.readAsDataURL(pagibigData.files[0]);
            $('#eye_pag_ibig').prop('disabled',false);
            $('#replace_pag_ibig').prop('disabled',false);
            $('#pag_ibig_button').hide();
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif ,pdf)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
      
  }
}

//Document Tab File Rename Function
var birthcertificate_file = $('#birthcertificate_file')[0];
var birthcertificate_button = $('#birthcertificate_button')[0];
var birthcertificate_text = $('#birthcertificate_text')[0];

$('#birthcertificate_file').on('change',function(){
    if (birthcertificate_file.value) {
        birthcertificate_text.innerHTML = "<b> File Name: </b>" + birthcertificate_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        birthcertificate_text.innerHTML = "No file chosen, yet.";
    }
});

var nbi_file = $('#nbi_file')[0];
var nbi_button = $('#nbi_button')[0];
var nbi_text = $('#nbi_text')[0];

$('#nbi_file').on('change',function(){
    if (nbi_file.value) {
        nbi_text.innerHTML = "<b> File Name: </b>" + nbi_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        nbi_text.innerHTML = "No file chosen, yet.";
    }
});

var barangay_clearance_file = $('#barangay_clearance_file')[0];
var barangay_clearance_button = $('#barangay_clearance_button')[0];
var barangay_clearance_text = $('#barangay_clearance_text')[0];

$('#barangay_clearance_file').on('change',function(){
    if (barangay_clearance_file.value) {
        barangay_clearance_text.innerHTML = "<b> File Name: </b>" + barangay_clearance_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        barangay_clearance_text.innerHTML = "No file chosen, yet.";
    }
});

var police_clearance_file = $('#police_clearance_file')[0];
var police_clearance_button = $('#police_clearance_button')[0];
var police_clearance_text = $('#police_clearance_text')[0];

$('#police_clearance_file').on('change',function(){
    if (police_clearance_file.value) {
        police_clearance_text.innerHTML = "<b> File Name: </b>" + police_clearance_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        police_clearance_text.innerHTML = "No file chosen, yet.";
    }
});

var sss_file = $('#sss_file')[0];
var sss_button = $('#sss_button')[0];
var sss_text = $('#sss_text')[0];

$('#sss_file').on('change',function(){
    if (sss_file.value) {
        sss_text.innerHTML = "<b> File Name: </b>" + sss_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        sss_text.innerHTML = "No file chosen, yet.";
    }
});

var philhealth_file = $('#philhealth_file')[0];
var philhealth_button = $('#philhealth_button')[0];
var philhealth_text = $('#philhealth_text')[0];

$('#philhealth_file').on('change',function(){
    if (philhealth_file.value) {
        philhealth_text.innerHTML = "<b> File Name: </b>" + philhealth_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        philhealth_text.innerHTML = "No file chosen, yet.";
    }
});

var pag_ibig_file = $('#pag_ibig_file')[0];
var pag_ibig_button = $('#pag_ibig_button')[0];
var pag_ibig_text = $('#pag_ibig_text')[0];

$('#pag_ibig_file').on('change',function(){
    if (pag_ibig_file.value) {
        pag_ibig_text.innerHTML = "<b> File Name: </b>" + pag_ibig_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        pag_ibig_text.innerHTML = "No file chosen, yet.";
    }
});

//Document Tab Replace Function
$('#replace_birthcertificate').on('click',function(){
    $('#birthcertificate_file').val('');
    $('#preview_birthcertificate').attr('src','');//change the image source
    $('#preview_birthcertificate').hide();
    $('#birthcertificate_text').html('No file chosen, yet.');
    $('#birthcertificate_button').show();
    $('#eye_birthcertificate').prop('disabled',true);
    $('#replace_birthcertificate').prop('disabled',true);
    $('#birthcertificate_file').click();
});

$('#replace_nbi').on('click',function(){
    $('#nbi_file').val('');
    $('#preview_nbi').attr('src','');
    $('#preview_nbi').hide();
    $('#nbi_text').html('No file chosen, yet.');
    $('#nbi_button').show();
    $('#eye_nbi').prop('disabled',true);
    $('#replace_nbi').prop('disabled',true);
    $('#nbi_file').click();
});

$('#replace_barangay_clearance').on('click',function(){
    $('#barangay_clearance_file').val('');
    $('#preview_barangay_clearance').attr('src','');
    $('#preview_barangay_clearance').hide();
    $('#barangay_clearance_text').html('No file chosen, yet.');
    $('#barangay_clearance_button').show();
    $('#eye_barangay_clearance').prop('disabled',true);
    $('#replace_barangay_clearance').prop('disabled',true);
    $('#barangay_clearance_file').click();
});

$('#replace_police_clearance').on('click',function(){
    $('#police_clearance_file').val('');
    $('#preview_police_clearance').attr('src','');
    $('#preview_police_clearance').hide();
    $('#police_clearance_text').html('No file chosen, yet.');
    $('#police_clearance_button').show();
    $('#eye_police_clearance').prop('disabled',true);
    $('#replace_police-clearance').prop('disabled',true);
    $('#police_clearance_file').click();
});

$('#replace_sss').on('click',function(){
    $('#sss_file').val('');
    $('#preview_sss').attr('src','');
    $('#preview_sss').hide();
    $('#sss_text').html('No file chosen, yet.');
    $('#sss_button').show();
    $('#eye_sss').prop('disabled',true);
    $('#replace_sss').prop('disabled',true);
    $('#sss_file').click();
});

$('#replace_philhealth').on('click',function(){
    $('#philhealth_file').val('');
    $('#preview_philhealth').attr('src','');
    $('#preview_philhealth').hide();
    $('#philhealth_text').html('No file chosen, yet.');
    $('#philhealth_button').show();
    $('#eye_philhealth').prop('disabled',true);
    $('#replace_philhealth').prop('disabled',true);
    $('#philhealth_file').click();
});

$('#replace_pag_ibig').on('click',function(){
    $('#pag_ibig_file').val('');
    $('#preview_pag_ibig').attr('src','');
    $('#preview_pag_ibig').hide();
    $('#pag_ibig_text').html('No file chosen, yet.');
    $('#pag_ibig_button').show();
    $('#eye_pag_ibig').prop('disabled',true);
    $('#replace_pag_ibig').prop('disabled',true);
    $('#pag_ibig_file').click();
});

//Document Tab Preview Function
function documentPreview(newDocumentSrc){
    var newDocumentSrcNow = newDocumentSrc.src; //To get the source of the file uploaded
    var largeDocument = document.getElementById('document_display');
    largeDocument.src = newDocumentSrcNow;
}

//Document Tab Change Modal-Title Function
$('#preview_birthcertificate').on('click',function(){
    $('.modal-title').html('BIRTH CERTIFICATE');
});

$('#preview_nbi').on('click',function(){
    $('.modal-title').html('NBI CLEARANCE');
});

$('#preview_barangay_clearance').on('click',function(){
    $('.modal-title').html('BARANGAY CLEARANCE');
});

$('#preview_police_clearance').on('click',function(){
    $('.modal-title').html('POLICE CLEARANCE');
});

$('#preview_police_clearance').on('click',function(){
    $('.modal-title').html('POLICE CLEARANCE');
});

$('#preview_sss').on('click',function(){
    $('.modal-title').html('SSS E1 FORM');
});

$('#preview_philhealth').on('click',function(){
    $('.modal-title').html('PHILHEALTH FORM');
});

$('#preview_pag_ibig').on('click',function(){
    $('.modal-title').html('PAGIBIG FORM');
});

//////////////////////////////////////////////

//Performance Evaluation Tab Upload Validation
function memoValidation(){
    var memoData = document.getElementById('memo_file');
    var memoUploadPath = memoData.value;
    var memoExtension = memoUploadPath.substring(memoUploadPath.lastIndexOf('.') + 1).toLowerCase();
    
    if(memoExtension == "jpg" || memoExtension || "jpeg" || memoExtension == "png" || memoExtension == "gif" || memoExtension == "pdf"){
        if (memoData.files && memoData.files[0]) {
            var memoReader = new FileReader();
                memoReader.onload = function(e) {
                  $('#preview_memo').attr('src', e.target.result);
              }
              memoReader.readAsDataURL(memoData.files[0]);
              $('#eye_memo').prop('disabled',false);
              $('#replace_memo').prop('disabled',false);
              $('#memo_button').hide();
          }
    }
    else{
        Swal.fire({
            title: 'UNSUPPORTED FILE SELECTED',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif ,pdf)',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
}

function evaluationValidation(){
    var evaluationData = document.getElementById('evaluation_file');
    var evaluationUploadPath = evaluationData.value;
    var evaluationExtension = evaluationUploadPath.substring(evaluationUploadPath.lastIndexOf('.') + 1).toLowerCase();
    
    if(evaluationExtension == "jpg" || evaluationExtension || "jpeg" || evaluationExtension == "png" || evaluationExtension == "gif" || evaluationExtension == "pdf"){
        if (evaluationData.files && evaluationData.files[0]) {
            var evaluationReader = new FileReader();
                evaluationReader.onload = function(e) {
                  $('#preview_evaluation').attr('src', e.target.result);
              }
              evaluationReader.readAsDataURL(evaluationData.files[0]);
              $('#eye_evaluation').prop('disabled',false);
              $('#replace_evaluation').prop('disabled',false);
              $('#evaluation_button').hide();
            //   $('.preview_span').show();
          }
    }
    else{
        Swal.fire({
            title: 'UNSUPPORTED FILE SELECTED',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif ,pdf)',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
}

function contractsValidation(){
    var contractsData = document.getElementById('contracts_file');
    var contractsUploadPath = contractsData.value;
    var contractsExtension = contractsUploadPath.substring(contractsUploadPath.lastIndexOf('.') + 1).toLowerCase();
    
    if(contractsExtension == "jpg" || contractsExtension || "jpeg" || contractsExtension == "png" || contractsExtension == "gif" || contractsExtension == "pdf"){
        if (contractsData.files && contractsData.files[0]) {
            var contractsReader = new FileReader();
                contractsReader.onload = function(e) {
                  $('#preview_contracts').attr('src', e.target.result);
              }
              contractsReader.readAsDataURL(contractsData.files[0]);
              $('#eye_contracts').prop('disabled',false);
              $('#replace_contracts').prop('disabled',false);
              $('#contracts_button').hide();
            //   $('.preview_span').show();
          }
    }
    else{
        Swal.fire({
            title: 'UNSUPPORTED FILE SELECTED',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif ,pdf)',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
}

function resignationValidation() {
    var resignationData = document.getElementById('resignation_file');
    var resignationUploadPath = resignationData.value;
    var resignationExtension = resignationUploadPath.substring(resignationUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (resignationExtension == "jpg" || resignationExtension == "jpeg" || resignationExtension == "png" || resignationExtension == "gif" || resignationExtension == "pdf") {
        if (resignationData.files && resignationData.files[0]) {
          var resignationReader = new FileReader();
            resignationReader.onload = function(e) {
                $('#preview_resignation').attr('src', e.target.result);
            }
            resignationReader.readAsDataURL(resignationData.files[0]);
            $('#eye_resignation').prop('disabled',false);
            $('#replace_resignation').prop('disabled',false);
            $('#resignation_button').hide();
        }
    } 
    else {
        Swal.fire({
            title: 'UNSUPPORTED FILE SELECTED',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif ,pdf)',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
}

function terminationValidation() {
    var terminationData = document.getElementById('termination_file');
    var terminationUploadPath = terminationData.value;
    var terminationExtension = terminationUploadPath.substring(terminationUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (terminationExtension == "jpg" || terminationExtension == "jpeg" || terminationExtension == "png" || terminationExtension == "gif" || terminationExtension == "pdf") {
        if (terminationData.files && terminationData.files[0]) {
          var terminationReader = new FileReader();
            terminationReader.onload = function(e) {
                $('#preview_termination').attr('src', e.target.result);
            }
            terminationReader.readAsDataURL(terminationData.files[0]);
            $('#eye_termination').prop('disabled',false);
            $('#replace_termination').prop('disabled',false);
            $('#termination_button').hide();
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif ,pdf)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
  }
}

//Performance Evaluation Tab File Rename Function
var memo_file = $('#memo_file')[0];
var memo_button = $('#memo_button')[0];
var memo_text = $('#memo_text')[0];

$('#memo_file').on('change',function(){
    if (memo_file.value) {
        memo_text.innerHTML = "<b> File Name: </b>" + memo_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        memo_text.innerHTML = "No file chosen, yet.";
    }
});

var evaluation_file = $('#evaluation_file')[0];
var evaluation_button = $('#evaluation_button')[0];
var evaluation_text = $('#evaluation_text')[0];

$('#evaluation_file').on('change',function(){
    if (evaluation_file.value) {
        evaluation_text.innerHTML = "<b> File Name: </b>" + evaluation_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        evaluation_text.innerHTML = "No file chosen, yet.";
    }
});

var contracts_file = $('#contracts_file')[0];
var contracts_button = $('#contracts_button')[0];
var contracts_text = $('#contracts_text')[0];

$('#contracts_file').on('change',function(){
    if (contracts_file.value) {
        contracts_text.innerHTML = "<b> File Name: </b>" + contracts_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        contracts_text.innerHTML = "No file chosen, yet.";
    }
});

var resignation_file = $('#resignation_file')[0];
var resignation_button = $('#resignation_button')[0];
var resignation_text = $('#resignation_text')[0];

$('#resignation_file').on('change',function(){
    if (resignation_file.value) {
        resignation_text.innerHTML = "<b> File Name: </b>" + resignation_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        resignation_text.innerHTML = "No file chosen, yet.";
    }
});

var termination_file = $('#termination_file')[0];
var termination_button = $('#termination_button')[0];
var termination_text = $('#termination_text')[0];

$('#termination_file').on('change',function(){
    if (termination_file.value) {
        termination_text.innerHTML = "<b> File Name: </b>" + termination_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        termination_text.innerHTML = "No file chosen, yet.";
    }
});

//Performance Evaluation Tab Replace Function
$('#replace_memo').on('click',function(){
    $('#memo_file').val('');
    $('#preview_memo').attr('src','');//change the image source
    $('#preview_memo').hide();
    $('#memo_text').html('No file chosen, yet.');
    $('#memo_button').show();
    $('#eye_memo').prop('disabled',true);
    $('#replace_memo').prop('disabled',true);
    $('#memo_file').click();
});

$('#replace_evaluation').on('click',function(){
    $('#evaluation_file').val('');
    $('#preview_evaluation').attr('src','');//change the image source
    $('#preview_evaluation').hide();
    $('#evaluation_text').html('No file chosen, yet.');
    $('#evaluation_button').show();
    $('#eye_evaluation').prop('disabled',true);
    $('#replace_evaluation').prop('disabled',true);
    $('#evaluation_file').click();
});

$('#replace_contracts').on('click',function(){
    $('#contracts_file').val('');
    $('#preview_contracts').attr('src','');//change the image source
    $('#preview_contracts').hide();
    $('#contracts_text').html('No file chosen, yet.');
    $('#contracts_button').show();
    $('#eye_contracts').prop('disabled',true);
    $('#replace_contracts').prop('disabled',true);
    $('#contracts_file').click();
});

$('#replace_resignation').on('click',function(){
    $('#resignation_file').val('');
    $('#preview_resignation').attr('src','');//change the image source
    $('#preview_resignation').hide();
    $('#resignation_text').html('No file chosen, yet.');
    $('#resignation_button').show();
    $('#eye_resignation').prop('disabled',true);
    $('#replace_resignation').prop('disabled',true);
    $('#resignation_file').click();
});

$('#replace_termination').on('click',function(){
    $('#termination_file').val('');
    $('#preview_termination').attr('src','');//change the image source
    $('#preview_termination').hide();
    $('#termination_text').html('No file chosen, yet.');
    $('#termination_button').show();
    $('#eye_termination').prop('disabled',true);
    $('#replace_termination').prop('disabled',true);
    $('#termination_file').click();
});

//Document Tab Preview Function
function performancePreview(newPerformanceFilesrc){
    var newPerformanceFileNow = newPerformanceFilesrc.src; //To get the source of the file uploaded
    var performanceFile = document.getElementById('performance_display');
    performanceFile.src = newPerformanceFileNow;
}

//Performance Tab Change Modal Title Function
$('#preview_resignation').on('click',function(){
    $('.modal-title').html('RESIGNATION LETTER');
});

$('#preview_termination').on('click',function(){
    $('.modal-title').html('TERMINATION LETTER');
});