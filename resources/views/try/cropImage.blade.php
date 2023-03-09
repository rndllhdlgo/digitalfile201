@extends('layouts.app')

@section('content')
    <input type="hidden" id="employee_num" value="50006">
    {{-- <button type="button" class="btn btn-primary mt-2" onclick="$('#employee_image').click();"><span><i class="fa-solid fa-upload"></i> UPLOAD</span></button> --}}
    <button type="button" id="cropModalBtn" class="btn btn-primary mt-2"><span><i class="fa-solid fa-upload"></i>UPLOAD IMAGE</span> </button>
    <input type="file" id="employee_image" name="employee_image" style="display:none;" onchange="ImageValidation(employee_image)">
    <div style="height:250px;width:250px; border:2px solid black;" class="mt-2"></div>

    {{-- <button class="btn btn-primary mt-2" id="image_save"><span>SAVE IMAGE</span></button> --}}

    <div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">CROP IMAGE</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="height:250px;width:250px; border:1px solid gray;" class="mt-2 center">
                  <img src="" id="image_preview" alt="IMAGE OF EMPLOYEE">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary mt-2" id="image_crop" onclick="CropImage()"><span>CROP IMAGE</span></button>
            </div>
          </div>
        </div>
    </div>

    <input type="file" >
<script>
    var croppedImageDataURL;

    $('#loading').hide();

    $('#cropModalBtn').on('click',function(){
        $('#employee_image').click();
        $('#cropModal').modal('show');
    });

    $("#image_crop").click(function() {
        // Get the source of the image element
        var img_src = $("#image_preview").attr("src");

        // Create an <a> element with the download attribute
        var link = document.createElement("a");
        link.download = $('#employee_num').val();

        // Set the href attribute to the image source URL
        link.href = img_src;

        // Programmatically click the link to initiate the download
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    function ImageValidation(employee_image) {
        var imageData = document.getElementById('employee_image');

        if (imageData.files && imageData.files[0]) {
            var imageReader = new FileReader();
                imageReader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                    $('#image_preview').show();
                        var cropper = new Cropper($('#image_preview')[0], {
                        aspectRatio: 1, 
                        viewMode: 1,
                        dragMode: 'move',
                        cropBoxMovable: false,
                        cropBoxResizable: false,
                    });
                    $('#image_crop').data('cropper', cropper);
                }
                imageReader.readAsDataURL(imageData.files[0]);
        }
    }
    
    function CropImage() {
        var cropper = $('#image_crop').data('cropper');
        var canvas = cropper.getCroppedCanvas();
        var croppedImageDataURL = canvas.toDataURL("image/jpeg");
        $('#image_preview').attr('src', croppedImageDataURL);
        cropper.destroy();
    }


    function saveImage() {
        var formData = new FormData();
        formData.append('croppedImage', croppedImageDataURL);

        $.ajax({
            url: '/cropImageSave',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response);
                croppedImageDataURL = response;
            }
        });
    }

    $('#image_save').on('click',function(){
        saveImage();
    });
    

    // Upload image and remove background using Remove.bg API
function uploadAndRemoveBackground(imageFile) {
  var formData = new FormData();
  formData.append("image_file", imageFile);

  $.ajax({
    url: "https://api.remove.bg/v1.0/removebg",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    headers: {
      "X-Api-Key": "YOUR_API_KEY" // Replace with your Remove.bg API key
    },
    success: function(result) {
      // Display the resulting image with transparent background
      $("#result-image").attr("src", result.data.result_url);
    },
    error: function(xhr, status, error) {
      console.log("Error: " + error);
    }
  });
}

// When file input changes, upload and remove background of selected image
$("#file-input").change(function() {
  var imageFile = $(this)[0].files[0];
  uploadAndRemoveBackground(imageFile);
});

</script>
@endsection