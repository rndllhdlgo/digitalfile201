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

function BirthCertificateValidation() {
    var birthcertData = document.getElementById('birthcertificate_file');
    var birthcertUploadPath = birthcertData.value;
    var birthcertExtension = birthcertUploadPath.substring(birthcertUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (birthcertExtension == "jpg" || birthcertExtension == "jpeg" || birthcertExtension == "png" || birthcertExtension == "gif" || birthcertExtension == "pdf") {
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

//Attach File Documents Function
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

//Replace Documents Function
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



//Preview of file upload in Modal Form
function changePreview(newSrc){
    var newSrcNow = newSrc.src; //To get the source of the file uploaded
    var largImg = document.getElementById('file_display');
    largImg.src = newSrcNow;
}
//Change .modal-title function
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