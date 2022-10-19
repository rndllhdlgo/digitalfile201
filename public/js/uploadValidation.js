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
            $('.column-1').css("height","300px");
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
    var fuData = document.getElementById('birthcertificate_file');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif" || Extension == "pdf") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_birthcertificate').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#eye_birthcertificate').prop('disabled',false);
            $('#replace_birthcertificate').prop('disabled',false);
            $('#birthcertificate_button').hide();
            // $('#preview_birthcertificate').show();
            // $('#birthcertificate_button').html('<span class="fas fa-upload"></span> REPLACE FILE');
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
    var fuData = document.getElementById('nbi_file');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif" || Extension == "pdf") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_nbi').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#eye_nbi').prop('disabled',false);
            $('#replace_nbi').prop('disabled',false);
            $('#nbi_button').hide();
            // $('#preview_nbi').show();
            // $('#nbi_button').html('<span class="fas fa-upload"></span> REPLACE FILE');

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
    var fuData = document.getElementById('barangay_clearance_file');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif" || Extension == "pdf") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_barangay_clearance').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#eye_barangay_clearance').prop('disabled',false);
            $('#replace_barangay_clearance').prop('disabled',false);
            $('#barangay_clearance_button').hide();
            // $('#preview_barangay_clearance').show();
            // $('#barangay_clearance_button').html('<span class="fas fa-upload"></span> REPLACE FILE');
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
    var fuData = document.getElementById('police_clearance_file');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif" || Extension == "pdf") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_police_clearance').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#eye_police_clearance').prop('disabled',false);
            $('#replace_police_clearance').prop('disabled',false);
            $('#police_clearance_button').hide();
            // $('#preview_police_clearance').show();
            // $('#police_clearance_button').html('<span class="fas fa-upload"></span> REPLACE FILE');
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
    var fuData = document.getElementById('sss_file');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif" || Extension == "pdf") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_sss').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#eye_sss').prop('disabled',false);
            $('#replace_sss').prop('disabled',false);
            $('#sss_button').hide();
            // $('#preview_sss').show();
            // $('#sss_button').html('<span class="fas fa-upload"></span> REPLACE FILE');
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
    var fuData = document.getElementById('philhealth_file');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif" || Extension == "pdf") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_philhealth').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#eye_philhealth').prop('disabled',false);
            $('#replace_philhealth').prop('disabled',false);
            $('#philhealth_button').hide();
            // $('#preview_philhealth').show();
            // $('#philhealth_button').html('<span class="fas fa-upload"></span> REPLACE FILE');
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
    var fuData = document.getElementById('pag_ibig_file');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif" || Extension == "pdf") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_pag_ibig').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#eye_pag_ibig').prop('disabled',false);
            $('#replace_pag_ibig').prop('disabled',false);
            $('#pag_ibig_button').hide();
            // $('#preview_pag_ibig').show();
            // $('#pag_ibig_button').html('<span class="fas fa-upload"></span> REPLACE FILE');
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

