//This JS is to Display Preview of Image and Validation Upload

//Personal Information Tab
function ImageValidation(cover_image) {
    var imageData = document.getElementById('cover_image');
    var imageUploadPath = imageData.value;
    var imageExtension = imageUploadPath.substring(imageUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var imageFileSize = $("#cover_image").get(0).files[0].size;

    //Check what type of file that the user upload
    if ((imageExtension != "jpg" && imageExtension != "jpeg" && imageExtension != "png" && imageExtension != "gif") && imageFileSize > 5242880) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (5MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif) and with size not greater than 5MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else if(imageExtension != "jpg" && imageExtension != "jpeg" && imageExtension != "png" && imageExtension != "gif"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(imageFileSize > 5242880){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (5MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 5MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }   
    else {
        //To display the uploaded file
        if (imageData.files && imageData.files[0]) {
            var imageReader = new FileReader();
                imageReader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                }
                imageReader.readAsDataURL(imageData.files[0]);
                $('#image_user').hide();
                $('#image_button').hide();
                $('#image_close').show();
                $('#image_preview').show();
                $('.column-1').addClass('blue');
        }
    }
}

//Documents Tab Upload Validation
function BirthCertificateValidation(birthcertificate_file) {
    var birthcertData = document.getElementById('birthcertificate_file');
    var birthcertUploadPath = birthcertData.value;
    var birthcertExtension = birthcertUploadPath.substring(birthcertUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var birthcertFileSize = $("#birthcertificate_file").get(0).files[0].size;

    //Check what type of file that the user upload
    if (birthcertExtension != "pdf" && birthcertFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(birthcertExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(birthcertFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else {
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
}

function nbiValidation(nbi_file) {
    var nbiData = document.getElementById('nbi_file');
    var nbiUploadPath = nbiData.value;
    var nbiExtension = nbiUploadPath.substring(nbiUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var nbiFileSize = $("#nbi_file").get(0).files[0].size;

    if (nbiExtension != "pdf" && nbiFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(nbiExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(nbiFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
        //To display the uploaded file
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
}

function barangayclearanceValidation(barangay_clearance_file) {
    var barangayClearanceData = document.getElementById('barangay_clearance_file');
    var barangayClearanceUploadPath = barangayClearanceData.value;
    var barangayClearanceExtension = barangayClearanceUploadPath.substring(barangayClearanceUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var barangayClearanceFileSize = $("#barangay_clearance_file").get(0).files[0].size;

    if (barangayClearanceExtension != "pdf" && barangayClearanceFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(barangayClearanceExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(barangayClearanceFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
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
}

function policeclearanceValidation(police_clearance_file) {
    var policeClearanceData = document.getElementById('police_clearance_file');
    var policeClearanceUploadPath = policeClearanceData.value;
    var policeClearanceExtension = policeClearanceUploadPath.substring(policeClearanceUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var policeClearanceFileSize = $("#police_clearance_file").get(0).files[0].size;

    if (policeClearanceExtension != "pdf" && policeClearanceFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else if(policeClearanceExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(policeClearanceFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
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
}

function sssValidation(sss_file) {
    var sssData = document.getElementById('sss_file');
    var sssUploadPath = sssData.value;
    var sssExtension = sssUploadPath.substring(sssUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var sssFileSize = $("#sss_file").get(0).files[0].size;

    if (sssExtension != "pdf" && sssFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else if(sssExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(sssFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
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
}

function philhealthValidation(philhealth_file) {
    var philhealthData = document.getElementById('philhealth_file');
    var philhealthUploadPath = philhealthData.value;
    var philhealthExtension = philhealthUploadPath.substring(philhealthUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var philhealthFileSize = $("#philhealth_file").get(0).files[0].size;

    if (philhealthExtension != "pdf" && sssFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else if(philhealthExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(philhealthFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
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
}

function pagibigValidation(pag_ibig_file) {
    var pagibigData = document.getElementById('pag_ibig_file');
    var pagibigUploadPath = pagibigData.value;
    var pagibigExtension = pagibigUploadPath.substring(pagibigUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var pagibigFileSize = $("#pag_ibig_file").get(0).files[0].size;

    if (pagibigExtension != "pdf" && pagibigFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else if(pagibigExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(pagibigFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
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
}

function medicalCertificateValidation(medical_certificate_file) {
    var medicalCertificateData = document.getElementById('medical_certificate_file');
    var medicalCertificateUploadPath = medicalCertificateData.value;
    var medicalCertificateExtension = medicalCertificateUploadPath.substring(medicalCertificateUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var medicalCertificateFileSize = $("#medical_certificate_file").get(0).files[0].size;

    if (medicalCertificateExtension != "pdf" && medicalCertificateFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else if(medicalCertificateExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(medicalCertificateFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
        if (medicalCertificateData.files && medicalCertificateData.files[0]) {
            var medicalCertificateReader = new FileReader();
                medicalCertificateReader.onload = function(e) {
                    $('#medical_certificate_preview').attr('src', e.target.result);
                }
                medicalCertificateReader.readAsDataURL(medicalCertificateData.files[0]);
                $('#medical_certificate_view').prop('disabled',false);
                $('#medical_certificate_replace').prop('disabled',false);
                $('#medical_certificate_button').hide();
        }
    }
}

function torValidation(tor_file) {
    var torData = document.getElementById('tor_file');
    var torUploadPath = torData.value;
    var torExtension = torUploadPath.substring(torUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var torFileSize = $("#tor_file").get(0).files[0].size;

    if (torExtension != "pdf" && torFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else if(torExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(torFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
        if (torData.files && torData.files[0]) {
            var torReader = new FileReader();
                torReader.onload = function(e) {
                    $('#tor_preview').attr('src', e.target.result);
                }
                torReader.readAsDataURL(torData.files[0]);
                $('#tor_view').prop('disabled',false);
                $('#tor_replace').prop('disabled',false);
                $('#tor_button').hide();
        }
    }
}

function diplomaValidation(diploma_file) {
    var diplomaData = document.getElementById('diploma_file');
    var diplomaUploadPath = diplomaData.value;
    var diplomaExtension = diplomaUploadPath.substring(diplomaUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var diplomaFileSize = $("#diploma_file").get(0).files[0].size;

    if (diplomaExtension != "pdf" && diplomaFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    } 
    else if(diplomaExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(diplomaFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
        if (diplomaData.files && diplomaData.files[0]) {
            var diplomaReader = new FileReader();
                diplomaReader.onload = function(e) {
                    $('#diploma_preview').attr('src', e.target.result);
                }
                diplomaReader.readAsDataURL(diplomaData.files[0]);
                $('#diploma_view').prop('disabled',false);
                $('#diploma_replace').prop('disabled',false);
                $('#diploma_button').hide();
        }
    }
}


//Display the selected file text and to remove fake path
var birthcertificate_file = $('#birthcertificate_file')[0];
var birthcertificate_button = $('#birthcertificate_button')[0];
var birthcertificate_text = $('#birthcertificate_text')[0];

$('#birthcertificate_file').on('change',function(){
    if (birthcertificate_file.value) {
        birthcertificate_text.innerHTML = "<b>File Name</b>: " + birthcertificate_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        birthcertificate_text.innerHTML = "No file chosen.";
    }
});

var nbi_file = $('#nbi_file')[0];
var nbi_button = $('#nbi_button')[0];
var nbi_text = $('#nbi_text')[0];

$('#nbi_file').on('change',function(){
    if (nbi_file.value) {
        nbi_text.innerHTML = "<b>File Name</b>: " + nbi_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        nbi_text.innerHTML = "No file chosen.";
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
        barangay_clearance_text.innerHTML = "No file chosen.";
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
        police_clearance_text.innerHTML = "No file chosen.";
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
        sss_text.innerHTML = "No file chosen.";
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
        philhealth_text.innerHTML = "No file chosen.";
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
        pag_ibig_text.innerHTML = "No file chosen.";
    }
});

var medical_certificate_file = $('#medical_certificate_file')[0];
var medical_certificate_button = $('#medical_certificate_button')[0];
var medical_certificate_text = $('#medical_certificate_text')[0];

$('#medical_certificate_file').on('change',function(){
    if (medical_certificate_file.value) {
        medical_certificate_text.innerHTML = "<b> File Name: </b>" + medical_certificate_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        medical_certificate_text.innerHTML = "No file chosen.";
    }
});

var tor_file = $('#tor_file')[0];
var tor_button = $('#tor_button')[0];
var tor_text = $('#tor_text')[0];

$('#tor_file').on('change',function(){
    if (tor_file.value) {
        tor_text.innerHTML = "<b> File Name: </b>" + tor_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        tor_text.innerHTML = "No file chosen.";
    }
});

var diploma_file = $('#diploma_file')[0];
var diploma_button = $('#diploma_button')[0];
var diploma_text = $('#diploma_text')[0];

$('#diploma_file').on('change',function(){
    if (diploma_file.value) {
        diploma_text.innerHTML = "<b> File Name: </b>" + diploma_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        diploma_text.innerHTML = "No file chosen.";
    }
});

//Document Tab Replace Function
$('#birthcertificate_replace').on('click',function(){
    $('#birthcertificate_file').val('');
    $('#birthcertificate_preview').attr('src','');//change the image source
    $('#birthcertificate_preview').hide();
    $('#birthcertificate_text').html('No file chosen.');
    $('#birthcertificate_button').show();
    $('#birthcertificate_view').prop('disabled',true);
    $('#birthcertificate_replace').prop('disabled',true);
    $('#birthcertificate_file').click();
});

$('#nbi_replace').on('click',function(){
    $('#nbi_file').val('');
    $('#nbi_preview').attr('src','');
    $('#nbi_preview').hide();
    $('#nbi_text').html('No file chosen.');
    $('#nbi_button').show();
    $('#nbi_view').prop('disabled',true);
    $('#nbi_replace').prop('disabled',true);
    $('#nbi_file').click();
});

$('#barangay_clearance_replace').on('click',function(){
    $('#barangay_clearance_file').val('');
    $('#barangay_clearance_preview').attr('src','');
    $('#barangay_clearance_preview').hide();
    $('#barangay_clearance_text').html('No file chosen.');
    $('#barangay_clearance_button').show();
    $('#barangay_clearance_view').prop('disabled',true);
    $('#barangay_clearance_replace').prop('disabled',true);
    $('#barangay_clearance_file').click();
});

$('#police_clearance_replace').on('click',function(){
    $('#police_clearance_file').val('');
    $('#police_clearance_preview').attr('src','');
    $('#police_clearance_preview').hide();
    $('#police_clearance_text').html('No file chosen.');
    $('#police_clearance_button').show();
    $('#police_clearance_view').prop('disabled',true);
    $('#replace_police-clearance').prop('disabled',true);
    $('#police_clearance_file').click();
});

$('#sss_replace').on('click',function(){
    $('#sss_file').val('');
    $('#sss_preview').attr('src','');
    $('#sss_preview').hide();
    $('#sss_text').html('No file chosen.');
    $('#sss_button').show();
    $('#sss_view').prop('disabled',true);
    $('#sss_replace').prop('disabled',true);
    $('#sss_file').click();
});

$('#philhealth_replace').on('click',function(){
    $('#philhealth_file').val('');
    $('#philhealth_preview').attr('src','');
    $('#philhealth_preview').hide();
    $('#philhealth_text').html('No file chosen.');
    $('#philhealth_button').show();
    $('#philhealth_view').prop('disabled',true);
    $('#philhealth_replace').prop('disabled',true);
    $('#philhealth_file').click();
});

$('#pag_ibig_replace').on('click',function(){
    $('#pag_ibig_file').val('');
    $('#pag_ibig_preview').attr('src','');
    $('#pag_ibig_preview').hide();
    $('#pag_ibig_text').html('No file chosen.');
    $('#pag_ibig_button').show();
    $('#pag_ibig_view').prop('disabled',true);
    $('#pag_ibig_replace').prop('disabled',true);
    $('#pag_ibig_file').click();
});

$('#medical_certificate_replace').on('click',function(){
    $('#medical_certificate_file').val('');
    $('#medical_certificate_preview').attr('src','');
    $('#medical_certificate_preview').hide();
    $('#medical_certificate_text').html('No file chosen.');
    $('#medical_certificate_button').show();
    $('#medical_certificate_view').prop('disabled',true);
    $('#medical_certificate_replace').prop('disabled',true);
    $('#medical_certificate_file').click();
});

//Document Tab Preview Function
function documentPreview(newDocumentSrc){
    var newDocumentSrcNow = newDocumentSrc.src; //To get the source of the file uploaded
    var largeDocument = document.getElementById('document_display');
    largeDocument.src = newDocumentSrcNow;
}

//Document Tab Change Modal Title Function on Click
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
                    $('#termination_preview').attr('src', e.target.result);
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
        memo_text.innerHTML = "<b class='text-center'> File Name: </b>" + memo_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        memo_text.innerHTML = "No file chosen.";
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
        evaluation_text.innerHTML = "No file chosen.";
    }
});

var contracts_file = $('#contracts_file')[0];
var contracts_button = $('#contracts_button')[0];
var contracts_text = $('#contracts_text')[0];

$('#contracts_file').on('change',function(){
    if (contracts_file.value) {
        contracts_text.innerHTML = "<b>File Name: </b>" + contracts_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        contracts_text.innerHTML = "No file chosen.";
    }
});

var resignation_file = $('#resignation_file')[0];
var resignation_button = $('#resignation_button')[0];
var resignation_text = $('#resignation_text')[0];

$('#resignation_file').on('change',function(){
    if (resignation_file.value) {
        resignation_text.innerHTML = "<b>File Name:</b> " + resignation_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        resignation_text.innerHTML = "No file chosen.";
    }
});

var termination_file = $('#termination_file')[0];
var termination_button = $('#termination_button')[0];
var termination_text = $('#termination_text')[0];

$('#termination_file').on('change',function(){
    if (termination_file.value) {
        termination_text.innerHTML = "<b>File Name:</b> " + termination_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];//To remove the fakepath and replace by the real extension name of the file uploaded
    }
    else {
        termination_text.innerHTML = "No file chosen.";
    }
});

//Performance Evaluation Tab Replace Function
$('#memo_replace').on('click',function(){
    $('#memo_file').val('');
    $('#memo_preview').attr('src','');//change the image source
    $('#memo_preview').hide();
    $('#memo_text').html('No file chosen.');
    $('#memo_button').show();
    $('#memo_view').prop('disabled',true);
    $('#memo_replace').prop('disabled',true);
    $('#memo_file').click();
});

$('#evaluation_replace').on('click',function(){
    $('#evaluation_file').val('');
    $('#evaluation_preview').attr('src','');//change the image source
    $('#evaluation_preview').hide();
    $('#evaluation_text').html('No file chosen.');
    $('#evaluation_button').show();
    $('#evaluation_view').prop('disabled',true);
    $('#evaluation_replace').prop('disabled',true);
    $('#evaluation_file').click();
});

$('#contracts_replace').on('click',function(){
    $('#contracts_file').val('');
    $('#contracts_preview').attr('src','');//change the image source
    $('#contracts_preview').hide();
    $('#contracts_text').html('No file chosen.');
    $('#contracts_button').show();
    $('#contracts_view').prop('disabled',true);
    $('#contracts_replace').prop('disabled',true);
    $('#contracts_file').click();
});

$('#resignation_replace').on('click',function(){
    $('#resignation_file').val('');
    $('#resignation_preview').attr('src','');//change the image source
    $('#resignation_preview').hide();
    $('#resignation_text').html('No file chosen.');
    $('#resignation_button').show();
    $('#resignation_view').prop('disabled',true);
    $('#resignation_replace').prop('disabled',true);
    $('#resignation_file').click();
});

$('#termination_replace').on('click',function(){
    $('#termination_file').val('');
    $('#termination_preview').attr('src','');//change the image source
    $('#termination_preview').hide();
    $('#termination_text').html('No file chosen.');
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