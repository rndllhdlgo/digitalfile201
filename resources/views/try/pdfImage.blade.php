@extends('layouts.app')
@section('content')
<br>

<form>
    @csrf
    <input type="file" name="" id="pdf_file">
    <button type="button" id="submit">SUBMIT</button>
</form>
<script>
    $('#loading').hide();

    $(document).ready(function(){
        $('#submit').on('click',function(){
            var pdf_file = $('#pdf_file').prop('files')[0];
            var formData = new FormData();
            formData.append('pdf_file', pdf_file);

            $.ajax({
                url: '/save_pdf',
                method: 'post',
                data: formData,
                contentType : false,
                processData : false,
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    if(response == 'success'){
                        console.log('success');
                    }
                    else{
                        console.log(response);
                    }
                }
            });
        });
    });
</script>
@endsection