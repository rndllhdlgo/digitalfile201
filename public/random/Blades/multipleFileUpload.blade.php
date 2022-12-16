@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <form action="/saveMultipleFileUpload" method="POST" enctype="multipart/form-data" id="multipleFileUpload_form">
        @csrf
        
        <div class="main-div">
            <input type="file" class="form-control" name="files[]">
            <br>
            <input type="text" class="form-control" name="first_name[]" placeholder="First Name" autocomplete="off">
            <br>
            <button type="button" class="btn btn-success">ADD</button>
        </div>

        <div class="clone" style="display: none;">
            <div class="duplicate">
                <input type="file" class="form-control" name="files[]">
                <br>
                <input type="text" class="form-control" name="first_name[]" placeholder="First Name" autocomplete="off">
                <br>
                <button type="button" class="btn btn-danger">Remove</button>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-info text-white" id="submit_form">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function(){
        $(".btn-success").click(function(){
            var inputHtml = $(".clone").html();
            $(".main-div").after(inputHtml);
        });
    });

    $("body").on("click",".btn-danger", function(){
        $(this).parents(".duplicate").remove();
    });

    $('#submit_form').on('click',function(){
        $('#multipleFileUpload_form').submit();
    });
</script>
@endsection