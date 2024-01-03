var cropper;
function initializeCropper(){
    cropper = new Cropper($('#image_preview')[0],{
        aspectRatio: 1,
        viewMode: 3,
        dragMode: 'move',
        guides: false,
        zoomable: true,
        zoomOnWheel: true,
        zoomOnTouch: true,
        zoomRatio: 0.1,
        autoCropArea: 0.8
    });
}

$(document).on('click','#image_crop',function(){
    var canvas = cropper.getCroppedCanvas();
    var croppedImageDataURL = canvas.toDataURL("image/jpeg");
    $('#image_preview').attr('src', croppedImageDataURL);
    cropper.destroy();
    $('#image_close').show();
    $('#image_recrop').show();
    $('.top-container').hide();
    $('.bottom-container').show();
    employee_image_change = 'CHANGED';
    if(viewCounter != 0){
        changeCounter+2;
    }
    else{
        changeCounter++;
    }
    disableUpdate('', changeCounter, true);
});

$(document).on('click', '#image_zoom_in', function(){
    cropper.zoom(0.1);
});

$(document).on('click', '#image_zoom_out', function(){
    cropper.zoom(-0.1);
});

$(document).on('click', '#image_crop_reset', function(){
    cropper.reset();
    cropper.reset(true);
});

$(document).on('click', '#image_recrop', function(){
    Swal.fire({
        title: "RECROP IMAGE?",
        showCancelButton: true,
        confirmButtonText: "OK",
    }).then((result) => {
        if(result.isConfirmed){
            initializeCropper();
            $('#image_close').hide();
            $('#image_recrop').hide();
            $('.top-container').show();
            changeCounter--;
            disableUpdate('', changeCounter, true);
        }
    });
});

$(document).on('click','#image_close', function(){
    Swal.fire({
        title: "REMOVE IMAGE?",
        showCancelButton: true,
        confirmButtonText: "OK",
    }).then((result) => {
        if(result.isConfirmed){
            var img_delete = $('#filename').val();
            $.ajax({
                url:"/upload_picture",
                type:"get",
                async: false,
                success:function(image_upload_div){
                    $('.column1').html(image_upload_div);
                }
            });

            $('#filename_delete').val(img_delete);
            $('#filename').val('');

            employee_image_change = 'CHANGED';
            changeCounter--;
            disableUpdate('', changeCounter, true);
        }
    });
});

$(document).on('click', '#image_close_trash', function(){
    Swal.fire({
        title: "REMOVE IMAGE?",
        showCancelButton: true,
        confirmButtonText: "OK",
    }).then((result) => {
        if(result.isConfirmed){
            var img_delete = $('#filename').val();
            $.ajax({
                url:"/upload_picture",
                type:"get",
                async: false,
                success:function(image_upload_div){
                    $('.column1').html(image_upload_div);
                }
            });
        }
    });
});