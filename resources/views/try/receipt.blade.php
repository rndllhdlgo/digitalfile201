@extends('layouts.app')
@section('content')
<br>

<div class="row mb-3">
    <div class="col-6">
        <div class="f-outline">
            <input class="forminput form-control requiredField bg-white text-uppercase disabled" type="search" id="receipt" name="receipt" placeholder=" ">
            <label for="receipt" class="formlabel form-label">RECEIPT NO.</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <input type="file" id="fileInput" name="fileInput" class="form-control requiredField" accept="image/*, .pdf"/>
    </div>
</div>
<br>

<button type="button" id="btnSave"  class="btn btn-primary"><i class="fas fa-save"></i> SAVE</button>

<script>
    $('#loading').hide();

    $('#btnSave').on('click', function(){
        var formData = new FormData();
        var fileInput = $('#fileInput').prop('files')[0];

        formData.append('fileInput', fileInput);

        $.ajax({
            url: '/imageToPdf',
            method: 'post',
            data: formData,
            contentType : false,
            processData : false,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                $('#loading').hide();
                console.log(response);
            }
        });
    });
// $('#btnSave').on('click', function(){
//     var formData = new FormData();
//     var fileInput = $('#fileInput').prop('files')[0];

//     formData.append('fileInput', fileInput);

//     $.ajax({
//         url: '/splitPdf',
//         method: 'post',
//         data: formData,
//         contentType : false,
//         processData : false,
//         async: false,
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function(response){
//             $('#loading').hide();
//             console.log(response);
//         }
//     });
// });
// $('#btnSave').on('click', function(){
//     var receipt = $('#receipt').val();
//     var pdf_file = $('#pdf_file').prop('files')[0];
//     var formData = new FormData();
//     formData.append('receipt', receipt);
//     formData.append('pdf_file', pdf_file);

//     $.ajax({
//         url: '/save_receipt',
//         method: 'post',
//         data: formData,
//         contentType : false,
//         processData : false,
//         async: false,
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function(response){
//             $('#loading').hide();
//             if(response != 'success'){
//                 Swal.fire({
//                     title: 'SAVE FAILED',
//                     html: "<b>"+response+"</b>",
//                     icon: 'error',
//                 });
//                 return false;
//             }
//             else{
//                 Swal.fire({
//                     title: 'SAVE SUCCESS',
//                     icon: 'success',
//                     timer: 2000
//                 });
//             }
//         }
//     });
// });
</script>

@endsection