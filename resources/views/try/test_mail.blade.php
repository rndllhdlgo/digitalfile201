@extends('layouts.app')
@section('content')
<br>

<input type="text" placeholder="email" id="email" value="hidalgorendell5@gmail.com"><br><br>
<input type="text" placeholder="subject" id="subject" value="Attach File"><br><br>
<input type="text" placeholder="content" id="content" value="Attach Content"><br><br>
<input type="text" placeholder="filename" id="filename"><br><br>
<input type="file" name="file_path" id="file_path"><br><br>
<button type="button" id="submit" class="btn btn-primary">SUBMIT</button>

<script>
    $('#loading').hide();

    // console.log($('#email').val());
    $('#submit').on('click',function(){
        var formData = new FormData();

        var email = $('#email').val();
        var subject = $('#subject').val();
        var content = $('#content').val();
        var filename = $('#filename').val();
        var file_path = $('#file_path').prop('files')[0];

        formData.append('email', email);
        formData.append('subject', subject);
        formData.append('content', content);
        formData.append('filename', filename);
        formData.append('file_path', file_path);

        $.ajax({
            url: '/sendEmail',
            method: 'POST',
            headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                // Handle the success response
                console.log(response);
            },
        });
    });
</script>
@endsection