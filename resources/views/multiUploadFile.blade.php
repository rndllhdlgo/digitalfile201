@extends('layouts.app')

@section('content')

    <h1>MULTI UPLOAD</h1>

    <form method="POST" action="/multiupload" enctype="multipart/form-data">
        @csrf
        <div class="input-group xpress control-group 1st increment">
            <input type="file" name="filenames[]" class="myfrm form-control">
            <div class="input-group-btn">
                <button class="btn btn-success" type="button">Add</button>
            </div>
        </div>
        <div class="clone d-none">
            <div class="input-group xpress control-group 1st" style="margin-top:10px">
                <input type="file" name="filenames[]">
                <div class="input-group-btn">
                    <button class="btn btn-danger" type="button">REMOVE</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">SUBMIT</button>
    </form>

    <script>
        $(document).ready(function(){
            $('.btn-success').click(function(){
                var htmlData = $('.clone').html();
                $('.increment').after(htmlData);
            });
        });

        $('body').on('click', '.btn-danger', function(){
            $(this).parents('.xpress').remove();
        });
    </script>

@endsection

