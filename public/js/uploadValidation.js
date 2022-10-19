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
            // $('.column-1').css("height","300px");
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

