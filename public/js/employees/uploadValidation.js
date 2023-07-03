$(document).on('click','#image_button',function(){
    $('#employee_image').click();
});

$(document).on('click','#image_crop',function(){
    var cropper = $('#image_crop').data('cropper');
    var canvas = cropper.getCroppedCanvas();
    var croppedImageDataURL = canvas.toDataURL("image/jpeg");
    $('#image_preview').attr('src', croppedImageDataURL);
    $('#image_close').show();
    $('.top-container').hide();
    cropper.destroy();
});

function ImageValidation(employee_image) {
    var imageData = document.getElementById('employee_image');
    var imageUploadPath = imageData.value;
    var imageExtension = imageUploadPath.substring(imageUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var imageFileSize = $("#employee_image").get(0).files[0].size;

    if ((imageExtension != "jpg" && imageExtension != "jpeg" && imageExtension != "png") && imageFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else if(imageExtension != "jpg" && imageExtension != "jpeg" && imageExtension != "png"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });

    }
    else if(imageFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }
    else {
        if(imageData.files && imageData.files[0]) {
            var imageReader = new FileReader();
                imageReader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                    var cropper = new Cropper($('#image_preview')[0], {
                        aspectRatio: 1,
                        viewMode: 3,
                        dragMode: 'move',
                        guides:false,
                        zoomable: true,
                        zoomOnWheel: true,
                        zoomOnTouch: true,
                        zoomRatio: 0.1,
                        autoCropArea: 0.8
                    });
                    $('#image_crop').data('cropper', cropper);

                    $('#image_zoom_in').on('click', function() {
                        cropper.zoom(0.1);
                    });

                    $('#image_zoom_out').on('click', function() {
                        cropper.zoom(-0.1);
                    });

                    $('#image_crop_reset').on('click',function(){
                        cropper.reset();
                        cropper.reset(true);
                    });
                }
                imageReader.readAsDataURL(imageData.files[0]);
                $('#image_user').hide();
                $('#image_button').hide();
                $('#image_instruction').hide();
                $('#image_preview').show();
                $('.top-container').show();
        }
    }
}

function fileValidation(fileInputId, previewId, viewId){
    // console.log(fileInputId);
    // console.log(previewId);
    // console.log(viewId);

    var fileData = $("#" + fileInputId)[0];
    var uploadPath = fileData.value;
    var fileExtension = uploadPath.substring(uploadPath.lastIndexOf('.') + 1).toLowerCase();
    var fileSize = $("#" + fileInputId).get(0).files[0].size;

    if(fileExtension != "pdf" && fileSize > 5242880 * 2){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        $("#" + fileInputId).val('');
        $("#" + previewId).attr('src', '');
        $("#" + viewId).prop('disabled', true);
    }
    else if(fileExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        $("#" + fileInputId).val('');
        $("#" + previewId).attr('src', '');
        $("#" + viewId).prop('disabled', true);
    }
    else if(fileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        $("#" + fileInputId).val('');
        $("#" + previewId).attr('src', '');
        $("#" + viewId).prop('disabled', true);
    }
    else{
        if(fileData.files && fileData.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#" + previewId).attr('src', e.target.result);
            };
            reader.readAsDataURL(fileData.files[0]);
            $("#" + viewId).prop('disabled', false);
        }
    }
}

function documentPreview(newDocumentSrc){
    var newDocumentSrcNow = newDocumentSrc.src;
    var largeDocument = document.getElementById('document_display');
    largeDocument.src = newDocumentSrcNow;
}

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

$('#medical_certificate_preview').on('click',function(){
    $('.modal-title').html('MEDICAL CERTIFICATE');
});

$('#tor_preview').on('click',function(){
    $('.modal-title').html('TRANSCRIPT OF RECORD');
});

$('#diploma_preview').on('click',function(){
    $('.modal-title').html('DIPLOMA');
});

$('#resume_preview').on('click',function(){
    $('.modal-title').html('RESUME');
});

$('#memo_replace').on('click',function(){
    $('#memo_file').val('');
    $('#memo_preview').attr('src','');
    $('#memo_preview').hide();
    $('#memo_text').html('No file chosen.');
    $('#memo_button').show();
    $('#memo_view').prop('disabled',true);
    $('#memo_replace').prop('disabled',true);
    $('#memo_file').click();
});

$('#evaluation_replace').on('click',function(){
    $('#evaluation_file').val('');
    $('#evaluation_preview').attr('src','');
    $('#evaluation_preview').hide();
    $('#evaluation_text').html('No file chosen.');
    $('#evaluation_button').show();
    $('#evaluation_view').prop('disabled',true);
    $('#evaluation_replace').prop('disabled',true);
    $('#evaluation_file').click();
});

$('#contracts_replace').on('click',function(){
    $('#contracts_file').val('');
    $('#contracts_preview').attr('src','');
    $('#contracts_preview').hide();
    $('#contracts_text').html('No file chosen.');
    $('#contracts_button').show();
    $('#contracts_view').prop('disabled',true);
    $('#contracts_replace').prop('disabled',true);
    $('#contracts_file').click();
});

$('#resignation_replace').on('click',function(){
    $('#resignation_file').val('');
    $('#resignation_preview').attr('src','');
    $('#resignation_preview').hide();
    $('#resignation_text').html('No file chosen.');
    $('#resignation_button').show();
    $('#resignation_view').prop('disabled',true);
    $('#resignation_replace').prop('disabled',true);
    $('#resignation_file').click();
});

$('#termination_replace').on('click',function(){
    $('#termination_file').val('');
    $('#termination_preview').attr('src','');
    $('#termination_preview').hide();
    $('#termination_text').html('No file chosen.');
    $('#termination_button').show();
    $('#termination_view').prop('disabled',true);
    $('#termination_replace').prop('disabled',true);
    $('#termination_file').click();
});

$('#birthcertificate_replace').on('click',function(){
    $('#birthcertificate_file').val('');
    $('#birthcertificate_preview').attr('src','');
    $('#birthcertificate_preview').hide();
    $('#birthcertificate_text').html('No file chosen.');
    $('#birthcertificate_button').show();
    $('#birthcertificate_view').prop('disabled',true);
    $('#birthcertificate_replace').prop('disabled',true);
    $('#birthcertificate_file').click();
});

$('#nbi_replace').on('click',function(){
    $('#nbi_clearance_file').val('');
    $('#nbi_preview').attr('src','');
    $('#nbi_preview').hide();
    $('#nbi_text').html('No file chosen.');
    $('#nbi_button').show();
    $('#nbi_clearance_view').prop('disabled',true);
    $('#nbi_replace').prop('disabled',true);
    $('#nbi_clearance_file').click();
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
    $('#police_clearance_replace').prop('disabled',true);
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

$('#tor_replace').on('click',function(){
    $('#tor_file').val('');
    $('#tor_preview').attr('src','');
    $('#tor_preview').hide();
    $('#tor_text').html('No file chosen.');
    $('#tor_button').show();
    $('#tor_view').prop('disabled',true);
    $('#tor_replace').prop('disabled',true);
    $('#tor_file').click();
});

$('#diploma_replace').on('click',function(){
    $('#diploma_file').val('');
    $('#diploma_preview').attr('src','');
    $('#diploma_preview').hide();
    $('#diploma_text').html('No file chosen.');
    $('#diploma_button').show();
    $('#diploma_view').prop('disabled',true);
    $('#diploma_replace').prop('disabled',true);
    $('#diploma_file').click();
});

$('#resume_replace').on('click',function(){
    $('#resume_file').val('');
    $('#resume_preview').attr('src','');
    $('#resume_preview').hide();
    $('#resume_text').html('No file chosen.');
    $('#resume_button').show();
    $('#resume_view').prop('disabled',true);
    $('#resume_replace').prop('disabled',true);
    $('#resume_file').click();
});