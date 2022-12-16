@extends('layouts.app')

@section('content')
<br>
    <img id="donut_image_preview">
    <input type="file" id="donut_image" onchange="ImageDonutValidation(donut_image)">
    <button type="button" id="saveBtn">SAVE</button>
    
    <script>
        function ImageDonutValidation(donut_image) {
            var donutImageData = document.getElementById('donut_image');
            var donutImageUploadPath = donutImageData.value;
            var donutImageExtension = donutImageUploadPath.substring(donutImageUploadPath.lastIndexOf('.') + 1).toLowerCase();
            var donutImageFileSize = $("#donut_image").get(0).files[0].size;

            if ((donutImageExtension != "jpg" && donutImageExtension != "jpeg" && donutImageExtension != "png" && donutImageExtension != "gif") && donutImageFileSize > 5242880) {
                Swal.fire({
                    title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (5MB)!',
                    icon: 'error',
                    text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif) and with size not greater than 5MB.',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });

            } 
            else if(donutImageExtension != "jpg" && donutImageExtension != "jpeg" && donutImageExtension != "png" && donutImageExtension != "gif"){
                Swal.fire({
                    title: 'UNSUPPORTED FILE TYPE',
                    icon: 'error',
                    text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif).',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
                
            }
            else if(donutImageFileSize > 5242880){
                Swal.fire({
                    title: 'EXCEEDED MAXIMUM FILE SIZE (5MB)!',
                    icon: 'error',
                    text: 'Please upload valid file with size not greater than 5MB.',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            }   
            else {
                if (donutImageData.files && donutImageData.files[0]) {
                    var donutImageReader = new FileReader();
                        donutImageReader.onload = function(e) {
                            $('#donut_image_preview').attr('src', e.target.result);
                        }
                        donutImageReader.readAsDataURL(donutImageData.files[0]);
                        $('#donut_image').hide();
                        $('#donut_image_preview').show();
                }
            }
        }
        
        $('#saveBtn').on('click',function(){
            var donutImage;
            var formData = new FormData();
            var file = $('#donut_image').prop('files')[0];

            formData.append('file', file);
            $.ajax({
                url: '/donutImage/insertDonutImage',
                method: 'post',
                data: formData,
                contentType : false,
                processData : false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(){
                    console.log(file);
                }
            });
        });
    </script>
@endsection