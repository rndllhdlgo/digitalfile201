@extends('layouts.app')

@section('content')
    
    {{-- <img src="storage/employee_images/02-22-2023-11-20-09_Employee_Image.png" id="image">
    <button id="cropImageBtn">Crop Image</button>

    <img src="" id="output"> --}}
    {{-- <input type="file" id="imageInput">
    <img id="croppedImage"> --}}
    {{-- <button id="disableCropper">Disable Cropper</button> --}}

    <input type="file" id="image-input">
    <div id="image-container"></div>
    <button type="button" class="btn-primary" id="crop-button">CROP</button>

<style>
    .cropper-crop {
        pointer-events: none;
    }
</style>
<script>
    $('#loading').hide();
    $(function() {
        var cropper = null;
        var $imageInput = $('#image-input');
        var $imageContainer = $('#image-container');
        
        $imageInput.on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
            var image = new Image();
            image.src = e.target.result;
            $imageContainer.empty().append(image);
            
            // Initialize Cropperjs with the image element
            cropper = new Cropper(image,{
                dragMode: 'move',
                cropBoxMovable: false,
                cropBoxResizable: false,
            });
            };

            reader.readAsDataURL(file);
        });

        
        // Add a button to trigger cropping and display the result
        $('#crop-button').on('click', function() {
            // var croppedImageDataURL = cropper.getCroppedCanvas().toDataURL();
            // $imageContainer.empty().append('<img src="' + croppedImageDataURL + '">');
            $imageContainer.empty();
            var img = document.createElement('img');
            img.src = croppedImageDataURL;
            $imageContainer.append(img);
        });
    });

    // const imageInput = document.getElementById('imageInput');
    // const croppedImage = document.getElementById('croppedImage');
    // let cropper;

    // imageInput.addEventListener('change', (e) => {
    //     const file = e.target.files[0];
    //     const reader = new FileReader();

    // reader.onload = (e) => {
    //     const imageUrl = e.target.result;
    //     // Display the selected image in the <img> element
    //     croppedImage.setAttribute('src', imageUrl);

    //     // Destroy the previous Cropper.js instance (if any)
    //     if (cropper) {
    //     cropper.destroy();
    //     }

    //     // Create a new Cropper.js instance on the selected image
    //     cropper = new Cropper(croppedImage, {
    //         aspectRatio: 1,
    //         dragMode: 'move',
    //         cropBoxMovable: false,
    //         cropBoxResizable: false,
    //     });
    // };

    // reader.readAsDataURL(file);
    // });

    // const disableCropperButton = document.getElementById('disableCropper');

    // disableCropperButton.addEventListener('click', () => {
    // if (cropper) {
    //     cropper.destroy();
    // }
    // });

    // const image = document.getElementById('image');
    // const cropper = new Cropper(image, {
    //     aspectRatio: 1,
    //     dragMode: 'move',
    //     cropBoxMovable: false,
    //     cropBoxResizable: false,
    //     // other options...
    // });

    // $(document).on('click', '#cropImageBtn', function() {
    //     var croppedImage = cropper.getCroppedCanvas().toDataURL('image/png');
    //     document.getElementById('output').src = croppedImage;
    // });
</script>
@endsection