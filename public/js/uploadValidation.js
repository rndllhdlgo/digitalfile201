// Upload Validation
//Display Image and Validation
function ImageValidation() {
    var fuData = document.getElementById('cover_image');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//Check if the uploaded is an...

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif") {
        //To display the uploaded file
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
                    $('#birthcertificate_preview').attr('src', e.target.result);
                }
                birthcertReader.readAsDataURL(birthcertData.files[0]);
                $('#birthcertificate_view').prop('disabled',false);
                $('#birthcertificate_replace').prop('disabled',false);
                $('#birthcertificate_button').hide();
        }
    }
    else {
        Swal.fire({
            title: 'UNSUPPORTED FILE SELECTED',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif, .pdf, .doc)',
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
                    $('#nbi_preview').attr('src', e.target.result);
                }
                nbiReader.readAsDataURL(nbiData.files[0]);
                $('#nbi_view').prop('disabled',false);
                $('#nbi_replace').prop('disabled',false);
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
                    $('#barangay_clearance_preview').attr('src', e.target.result);
                }
                barangayClearanceReader.readAsDataURL(barangayClearanceData.files[0]);
                $('#barangay_clearance_view').prop('disabled',false);
                $('#barangay_clearance_replace').prop('disabled',false);
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
                    $('#police_clearance_preview').attr('src', e.target.result);
                }
                policeClearanceReader.readAsDataURL(policeClearanceData.files[0]);
                $('#police_clearance_view').prop('disabled',false);
                $('#police_clearance_replace').prop('disabled',false);
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
                    $('#sss_preview').attr('src', e.target.result);
                }
                sssReader.readAsDataURL(sssData.files[0]);
                $('#sss_view').prop('disabled',false);
                $('#sss_replace').prop('disabled',false);
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
                    $('#philhealth_preview').attr('src', e.target.result);
                }
                philhealthReader.readAsDataURL(philhealthData.files[0]);
                $('#philhealth_view').prop('disabled',false);
                $('#philhealth_replace').prop('disabled',false);
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
                    $('#pag_ibig_preview').attr('src', e.target.result);
                }
                pagibigReader.readAsDataURL(pagibigData.files[0]);
                $('#pag_ibig_view').prop('disabled',false);
                $('#pag_ibig_replace').prop('disabled',false);
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
$('#birthcertificate_replace').on('click',function(){
    $('#birthcertificate_file').val('');
    $('#birthcertificate_preview').attr('src','');//change the image source
    $('#birthcertificate_preview').hide();
    $('#birthcertificate_text').html('No file chosen, yet.');
    $('#birthcertificate_button').show();
    $('#birthcertificate_view').prop('disabled',true);
    $('#birthcertificate_replace').prop('disabled',true);
    $('#birthcertificate_file').click();
});

$('#nbi_replace').on('click',function(){
    $('#nbi_file').val('');
    $('#nbi_preview').attr('src','');
    $('#nbi_preview').hide();
    $('#nbi_text').html('No file chosen, yet.');
    $('#nbi_button').show();
    $('#nbi_view').prop('disabled',true);
    $('#nbi_replace').prop('disabled',true);
    $('#nbi_file').click();
});

$('#barangay_clearance_replace').on('click',function(){
    $('#barangay_clearance_file').val('');
    $('#barangay_clearance_preview').attr('src','');
    $('#barangay_clearance_preview').hide();
    $('#barangay_clearance_text').html('No file chosen, yet.');
    $('#barangay_clearance_button').show();
    $('#barangay_clearance_view').prop('disabled',true);
    $('#barangay_clearance_replace').prop('disabled',true);
    $('#barangay_clearance_file').click();
});

$('#police_clearance_replace').on('click',function(){
    $('#police_clearance_file').val('');
    $('#police_clearance_preview').attr('src','');
    $('#police_clearance_preview').hide();
    $('#police_clearance_text').html('No file chosen, yet.');
    $('#police_clearance_button').show();
    $('#police_clearance_view').prop('disabled',true);
    $('#replace_police-clearance').prop('disabled',true);
    $('#police_clearance_file').click();
});

$('#sss_replace').on('click',function(){
    $('#sss_file').val('');
    $('#sss_preview').attr('src','');
    $('#sss_preview').hide();
    $('#sss_text').html('No file chosen, yet.');
    $('#sss_button').show();
    $('#sss_view').prop('disabled',true);
    $('#sss_replace').prop('disabled',true);
    $('#sss_file').click();
});

$('#philhealth_replace').on('click',function(){
    $('#philhealth_file').val('');
    $('#philhealth_preview').attr('src','');
    $('#philhealth_preview').hide();
    $('#philhealth_text').html('No file chosen, yet.');
    $('#philhealth_button').show();
    $('#philhealth_view').prop('disabled',true);
    $('#philhealth_replace').prop('disabled',true);
    $('#philhealth_file').click();
});

$('#pag_ibig_replace').on('click',function(){
    $('#pag_ibig_file').val('');
    $('#pag_ibig_preview').attr('src','');
    $('#pag_ibig_preview').hide();
    $('#pag_ibig_text').html('No file chosen, yet.');
    $('#pag_ibig_button').show();
    $('#pag_ibig_view').prop('disabled',true);
    $('#pag_ibig_replace').prop('disabled',true);
    $('#pag_ibig_file').click();
});

//Document Tab Preview Function
function documentPreview(newDocumentSrc){
    var newDocumentSrcNow = newDocumentSrc.src; //To get the source of the file uploaded
    var largeDocument = document.getElementById('document_display');
    largeDocument.src = newDocumentSrcNow;
}

//Document Tab Change Modal-Title Function
$('#birthcertificate_preview').on('click',function(){
    $('.modal-title').html('BIRTH CERTIFICATE');
});

$('#nbi_preview').on('click',function(){
    $('.modal-title').html('NBI CLEARANCE');
});

$('#barangay_clearance_preview').on('click',function(){
    $('.modal-title').html('BARANGAY CLEARANCE');
});

$('#police_clearance_preview').on('click',function(){
    $('.modal-title').html('POLICE CLEARANCE');
});

$('#sss_preview').on('click',function(){
    $('.modal-title').html('SSS E1 FORM');
});

$('#philhealth_preview').on('click',function(){
    $('.modal-title').html('PHILHEALTH FORM');
});

$('#pag_ibig_preview').on('click',function(){
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
                  $('#memo_preview').attr('src', e.target.result);
                }
                memoReader.readAsDataURL(memoData.files[0]);
                $('#memo_view').prop('disabled',false);
                $('#memo_replace').prop('disabled',false);
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
                  $('#evaluation_preview').attr('src', e.target.result);
                }
                evaluationReader.readAsDataURL(evaluationData.files[0]);
                $('#evaluation_view').prop('disabled',false);
                $('#evaluation_replace').prop('disabled',false);
                $('#evaluation_button').hide();
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
                  $('#contracts_preview').attr('src', e.target.result);
                }
                contractsReader.readAsDataURL(contractsData.files[0]);
                $('#contracts_view').prop('disabled',false);
                $('#contracts_replace').prop('disabled',false);
                $('#contracts_button').hide();
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
                $('#resignation_preview').attr('src', e.target.result);
            }
            resignationReader.readAsDataURL(resignationData.files[0]);
            $('#resignation_view').prop('disabled',false);
            $('#resignation_replace').prop('disabled',false);
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
                $('#termination_view').prop('disabled',false);
                $('#termination_replace').prop('disabled',false);
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
$('#memo_replace').on('click',function(){
    $('#memo_file').val('');
    $('#memo_preview').attr('src','');//change the image source
    $('#memo_preview').hide();
    $('#memo_text').html('No file chosen, yet.');
    $('#memo_button').show();
    $('#memo_view').prop('disabled',true);
    $('#memo_replace').prop('disabled',true);
    $('#memo_file').click();
});

$('#evaluation_replace').on('click',function(){
    $('#evaluation_file').val('');
    $('#evaluation_preview').attr('src','');//change the image source
    $('#evaluation_preview').hide();
    $('#evaluation_text').html('No file chosen, yet.');
    $('#evaluation_button').show();
    $('#evaluation_view').prop('disabled',true);
    $('#evaluation_replace').prop('disabled',true);
    $('#evaluation_file').click();
});

$('#contracts_replace').on('click',function(){
    $('#contracts_file').val('');
    $('#contracts_preview').attr('src','');//change the image source
    $('#contracts_preview').hide();
    $('#contracts_text').html('No file chosen, yet.');
    $('#contracts_button').show();
    $('#contracts_view').prop('disabled',true);
    $('#contracts_replace').prop('disabled',true);
    $('#contracts_file').click();
});

$('#resignation_replace').on('click',function(){
    $('#resignation_file').val('');
    $('#resignation_preview').attr('src','');//change the image source
    $('#resignation_preview').hide();
    $('#resignation_text').html('No file chosen, yet.');
    $('#resignation_button').show();
    $('#resignation_view').prop('disabled',true);
    $('#resignation_replace').prop('disabled',true);
    $('#resignation_file').click();
});

$('#termination_replace').on('click',function(){
    $('#termination_file').val('');
    $('#preview_termination').attr('src','');//change the image source
    $('#preview_termination').hide();
    $('#termination_text').html('No file chosen, yet.');
    $('#termination_button').show();
    $('#termination_view').prop('disabled',true);
    $('#termination_replace').prop('disabled',true);
    $('#termination_file').click();
});

//Document Tab Preview Function
function performancePreview(newPerformanceFilesrc){
    var newPerformanceFileNow = newPerformanceFilesrc.src; //To get the source of the file uploaded
    var performanceFile = document.getElementById('performance_display');
    performanceFile.src = newPerformanceFileNow;
}

//Performance Tab Change Modal Title Function
$('#memo_preview').on('click',function(){
    $('.modal-title').html('MEMO');
});

$('#evaluation_preview').on('click',function(){
    $('.modal-title').html('EVALUATION');
});

$('#contracts_preview').on('click',function(){
    $('.modal-title').html('CONTRACT');
});

$('#resignation_preview').on('click',function(){
    $('.modal-title').html('RESIGNATION LETTER');
});

$('#termination_preview').on('click',function(){
    $('.modal-title').html('TERMINATION LETTER');
});