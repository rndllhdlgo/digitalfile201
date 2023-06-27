@extends('layouts.app')
@section('content')
<br>

<input type="text" id="first_name">
<br>
<br>
<button type="button" id="submit" class="btn btn-primary">SUBMIT</button>

<script>
    $('#loading').hide();

    $('#submit').on('click',function(){
        $.ajax({
            url: '/sendEmail',
            method: 'POST',
            headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                content: $('#first_name').val()
            },
            success: function(response) {
                // Handle the success response
                console.log(response);
            },
        });
    });
</script>
@endsection