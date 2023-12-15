$(document).on('click','#image_button',function(){
    $('#employee_image').click();
});

function ImageValidation(employee_image){
    var imageData       = document.getElementById('employee_image');
    var imageUploadPath = imageData.value;
    var imageExtension  = imageUploadPath.substring(imageUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var imageFileSize   = $("#employee_image").get(0).files[0].size;

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
        if(imageData.files && imageData.files[0]){
            var imageReader = new FileReader();
                imageReader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                    initializeCropper();
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
        if(fileInputId == 'memo_file' || fileInputId == 'evaluation_file' || fileInputId == 'contracts_file' || fileInputId == 'resignation_file' || fileInputId == 'termination_file'){
            return false;
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
        changeCounter++;
        disableUpdate('', changeCounter);
    }
}

function documentPreview(newDocumentSrc, modal_title){
    $('.modal_title').html(modal_title);
    var newDocumentSrcNow = newDocumentSrc.src;
    var largeDocument = document.getElementById('document_display');
    largeDocument.src = newDocumentSrcNow;
}