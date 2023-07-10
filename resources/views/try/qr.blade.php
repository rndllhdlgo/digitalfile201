@extends('layouts.app')
@section('content')

<br>
    <input type="text" id="content" name="content"><br><br>
    <button type="button" id="submit">SUBMIT</button>
    <br><br>
    <div id="qrCodeContainer"></div>
    {{-- <img id="qrCodeImage" src="" alt="QR Code" style="display:none;"> --}}
    <script>
        $('#loading').hide();
        $('#submit').on('click', function() {
            $.ajax({
                url: '/qrshow',
                method: 'POST',
                data: {
                    content: $('#content').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    $('#qrCodeContainer').html(response);
                },
            });
        });
    </script>
@endsection