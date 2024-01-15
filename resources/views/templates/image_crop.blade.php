@extends('layouts.app')
@section('content')

<input type="file" name="imageCrop" id="imageCrop" onchange="ImageValidation(imageCrop)">
<img src="" id="imageView" style="height:300px; width: 300px;">
<button type="button" class="btn btn-success" id="image_crop" title="CROP IMAGE"><i class="fas fa-crop"></i> Crop</button>
<button type="button" class="btn btn-success" id="image_recrop" title="RECROP IMAGE"><i class="fas fa-crop"></i> Recrop</button>

<script>
    $('#loading').hide();

    var cropper;

    function initializeCropper() {
        cropper = new Cropper($('#imageView')[0], {
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

    function ImageValidation(imageCrop) {
        var imageData = document.getElementById('imageCrop');
        var imageUploadPath = imageData.value;
        var imageExtension = imageUploadPath.substring(imageUploadPath.lastIndexOf('.') + 1).toLowerCase();
        var imageFileSize = $("#imageCrop").get(0).files[0].size;

        if (imageData.files && imageData.files[0]) {
            var imageReader = new FileReader();
            imageReader.onload = function (e) {
                $('#imageView').attr('src', e.target.result);
                initializeCropper();
            }
            imageReader.readAsDataURL(imageData.files[0]);
        }
    }

    $(document).on('click', '#image_crop', function () {
        var canvas = cropper.getCroppedCanvas();
        var croppedImageDataURL = canvas.toDataURL("image/jpeg");
        console.log(croppedImageDataURL);
        $('#imageView').attr('src', croppedImageDataURL);
        cropper.destroy();
    });

    $(document).on('click', '#image_recrop', function () {
        initializeCropper();
    });
</script>

@endsection