@extends('layouts.app')

@section('content')
<br>
<div class="p-2">
    <form action="/saveuploadMultipleFile" method="POST" enctype="multipart/form-data" id="multipleFile_form">
        @csrf
            <div class="row memo-div">
                <table class="table table-striped table-hover align-middle">
                    <thead class="thead-educational">
                        <tr>
                            <th style="width:22.5%">MEMO SUBJECT</th>
                            <th style="width:22.5%">MEMO DATE</th>
                            <th style="width:22.5%">MEMO PENALTY</th>
                            <th style="width:22.5%">MEMO FILE</th>
                            <th style="width:10%">ACTION</th>
                        </tr>
                    </thead>
                    <tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field text-capitalize" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                                <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all">(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all">(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
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
                        </td>
                        <td class="pb-3 pt-3">
                            <input  type="file" id="memo_file" name="memo_file[]" accept=".pdf" onchange="memoValidation(memo_file)">
                        </td>
                        <td class="pb-3 pt-3">
                            <button type="button" class="btn btn-success center btnMemoAdd"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="memo-div-clone" style="display: none;">
                <div class="row memo-duplicate-div">
                    <table class="table table-striped table-hover  align-middle" style="margin-top: -1.3%">
                        <tr>
                            <td class="pb-3 pt-3" style="width:22.5%;">
                                <div class="f-outline">
                                    <input class="forminput form-control multiple_field text-capitalize" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                                    <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all">(Optional)</span></label>
                                </div>
                            </td>
                            <td class="pb-3 pt-3" style="width:22.5%;">
                                <div class="f-outline">
                                    <input class="forminput memo_date_2 form-control multiple_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all">(Optional)</span></label>
                                </div>
                            </td>
                            <td class="pb-3 pt-3" style="width:22.5%;">
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
                            </td>
                            <td class="pb-3 pt-3" style="width:22.5%">
                                <input  type="file" id="memo_file" name="memo_file[]" accept=".pdf" onchange="memoValidation(memo_file)">
                            </td>
                            <td class="pb-3 pt-3" style="width:10%">
                                <button type="button" class="btn btn-danger center btnMemoRemove"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr> 
                    </table>
                </div>
            </div>
            <br>

            {{-- <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-info" id="submit_multipleFile">SUBMIT</button>
                </div>
            </div> --}}
    </form> 
</div>
<script>
    $(document).ready(function(){
        $(".btnMemoAdd").click(function(){
            var cloneMemo = $(".memo-div-clone").html();
            $(".memo-div").after(cloneMemo);
        });

        $(".btnEvaluationAdd").click(function(){
            var cloneEvaluation = $(".evaluation-div-clone").html();
            $(".evaluation-div").after(cloneEvaluation);
        });
    });

    $("body").on("click",".btnMemoRemove",function(){
        $(this).parents(".memo-duplicate-div").remove();
    });

    $('#submit_multipleFile').on('click',function(){
        $('#multipleFile_form').submit();
    });

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
    $('.memo_date_2').attr('max', maxDate);
    });

</script>

@endsection

{{-- <div class="row mb-3 main-div">
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
            </div> --}}

            {{-- <div class="row mb-3 duplicate-div">
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
            </div> --}}