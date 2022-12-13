{{-- @extends('layouts.app')

@section('content')
<br>
<div class="p-2">
    <form action="/saveuploadMultipleFile" method="POST" enctype="multipart/form-data" id="multipleFile_form">
        @csrf
        <div class="main-div">
            <input type="file" class="form-control" name="memo_file[]">
            <br>
            <button type="button" class="btn btn-success">ADD</button>
        </div>

        <div class="clone" style="display:none;">
            <div class="duplicate">
                <input type="file" class="form-control" name="memo_file[]">
                <button type="button" class="btn btn-danger">Remove</button>
            </div>
        </div>
        <br>
        <button type="button" id="submit_multipleFile" class="btn btn-primary">Submit</button>
    </form> 
</div>
<script>
    $(document).ready(function(){
        $(".btn-success").click(function(){
            var inputHtml = $(".clone").html();
            $(".main-div").after(inputHtml);
        });
    });

    $("body").on("click",".btn-danger",function(){
        $(this).parents(".duplicate").remove();
    });

    $('#submit_multipleFile').on('click',function(){
        $('#multipleFile_form').submit();
    });

</script>

@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<br>
    <form action="/saveuploadMultipleFile" method="POST" enctype="multipart/form-data" id="multipleFile_form">
        @csrf
        <div class="field_wrapper">
            <div>
                <input type="file" name="memo_file[]" id="memo_file" onchange="return memoValidation(memo_file)" accept=".pdf">
                <input type="date" id="memo_date" name="memo_date[]">
                <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus"></i></a>
                <br><br>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary" id="submit_multipleFile">SAVE</button>
    </form>

<script>
    $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="file" name="memo_file[]" id="memo_file" onchange="return memoValidation(memo_file)" accept=".pdf"><input type="date" id="memo_date" name="memo_date[]"><a href="javascript:void(0);" class="remove_button"><i class="fas fa-trash"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    $('#submit_multipleFile').on('click',function(){
        $('#multipleFile_form').submit();
    });

});

function memoValidation(memo_file) {
    var memoData = document.getElementById('memo_file');
    var memoUploadPath = memoData.value;
    var memoExtension = memoUploadPath.substring(memoUploadPath.lastIndexOf('.') + 1).toLowerCase();
    var memoFileSize = $("#memo_file").get(0).files[0].size;

    if (memoExtension != "pdf" && memoFileSize > 5242880 * 2) {
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE AND EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf) and with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        $('#memo_file').val('');
    } 
    else if(memoExtension != "pdf"){
        Swal.fire({
            title: 'UNSUPPORTED FILE TYPE',
            icon: 'error',
            text: 'Please upload file with an extension of (.pdf).',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        $('#memo_file').val('');
    }
    else if(memoFileSize > 5242880 * 2){
        Swal.fire({
            title: 'EXCEEDED MAXIMUM FILE SIZE (10MB)!',
            icon: 'error',
            text: 'Please upload valid file with size not greater than 10MB.',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        $('#memo_file').val('');
    }
    else {
        if (memoData.files && memoData.files[0]) {
            var memoReader = new FileReader();
                memoReader.onload = function(e) {
                    $('#memo_preview').attr('src', e.target.result);
                }
                memoReader.readAsDataURL(memoData.files[0]);
                $('#memo_view').prop('disabled',false);
                $('#memo_replace').prop('disabled',false);
                $('#memo_button').hide();
        }
    }
}

$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 0){
        month = '0' + month.toString();
    }
    if(day < 10){
        day = '0' + day.toString();
    }
    var maxDate = year + '-' + month + '-' + day;
    $('#memo_date').attr('max', maxDate);

});

</script>
@endsection --}}

@extends('layouts.app')

@section('content')

@endsection