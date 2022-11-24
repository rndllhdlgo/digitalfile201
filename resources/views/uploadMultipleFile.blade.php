@extends('layouts.app')

@section('content')
<br>
    {{-- <form action="/saveuploadMultipleFile" method="POST" enctype="multipart/form-data" id="multipleFile_form">
        @csrf
           <div class="row mb-3 main-div">
                 <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all">(Optional)</span></label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all">(Optional)</span></label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput multiple_field form-control" name="memo_penalty[]" id="memo_penalty" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT PENALTY</option>
                            <option value="Verbal">Verbal</option>
                            <option value="Written">Written</option>
                            <option value="2nd Offense">2nd Offense</option>
                            <option value="3rd Offense">3rd Offense</option>
                            <option value="Final">Final</option>
                        </select>
                        <label for="memo_penalty" class="formlabel form-label"><span class="span_memo_penalty span_all">(Optional)</span> </label>
                    </div>
                </div>

                <div class="col">
                    <input  type="file" id="memo_file" name="memo_file[]">
                </div>

                <div class="col">
                    <button type="button" class="btn btn-success btnMemoAdd"><i class="fas fa-plus"></i></button>
                </div> 
            </div>--}}

            {{-- <div class="main-div-clone" style="display: none;">
                <div class="row mb-3 duplicate-div">
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all">(Optional)</span></label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all">(Optional)</span></label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <select class="form-select forminput multiple_field form-control" name="memo_penalty[]"  id="memo_penalty" placeholder=" " style="background-color:white;">
                                <option value="" disabled selected>SELECT PENALTY</option>
                                <option value="Verbal">Verbal</option>
                                <option value="Written">Written</option>
                                <option value="2nd Offense">2nd Offense</option>
                                <option value="3rd Offense">3rd Offense</option>
                                <option value="Final">Final</option>
                            </select>
                            <label for="memo_penalty" class="formlabel form-label"><span class="span_memo_penalty span_all">(Optional)</span> </label>
                        </div>
                    </div>

                    <div class="col">
                        <input  type="file" id="memo_file" name="memo_file[]">
                    </div>

                    <div class="col">
                        <button type="button" class="btn btn-danger btnMemoRemove"><i class="fas fa-trash"></i></button>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-info" id="submit_multipleFile">SUBMIT</button>
                </div>
            </div> 
    </form> --}}

<script>
    // $(document).ready(function(){
    //     $(".btnMemoAdd").click(function(){
    //         var cloneMemo = $(".main-div-clone").html();
    //         $(".main-div").insertAfter(cloneMemo);
    //     });
    // });

    // $("body").on("click",".btnMemoRemove",function(){
    //     $(this).parents(".duplicate-div").remove();
    // });

    // $('#submit_multipleFile').on('click',function(){
    //     $('#multipleFile_form').submit();
    // });

</script>

@endsection