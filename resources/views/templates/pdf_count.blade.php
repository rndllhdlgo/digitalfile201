@extends('layouts.app')

@section('content')
<br>
    <h4>COUNT UPLOADED PDF FILES USING IMAGICK</h4>
<br>
    <div class="mb-3">
        <label for="pdf_file" class="form-label">Upload file to count</label>
        <input class="form-control" type="file" id="pdf_file">
        <br>
        <button type="button" class="btn btn-primary" id="btnUpload">UPLOAD</button>
        <br>
        <br>
        <span class="fw-bold" id="pdf_count"></span>
    </div>

<script>
    $('#loading').hide();

    $('#btnUpload').on('click', function(){
        var formData = new FormData();
        var pdf_file = $('#pdf_file').prop('files')[0];

        formData.append('pdf_file', pdf_file);

        $.ajax({
            url: '/pdf_count_save',
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
                $('#pdf_count').text(response);
            }
        });
    });
</script>
@endsection