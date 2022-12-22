@extends('layouts.app')

@section('content')
<br>
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control optional_field text-capitalize" type="search" id="fName" placeholder=" " style="background-color:white;" autocomplete="off">
                <label for="fName" class="formlabel form-label"><i class="fas fa-address-card"></i> fName
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control optional_field text-capitalize" type="search" id="mName" placeholder=" " style="background-color:white;" autocomplete="off">
                <label for="mName" class="formlabel form-label"><i class="fas fa-address-card"></i> mName 
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control optional_field text-capitalize" type="search" id="lName" placeholder=" " style="background-color:white;" autocomplete="off">
                <label for="lName" class="formlabel form-label"><i class="fas fa-address-card"></i> lName
            </div>
        </div>
    </div>

        <h5 class="table-title">COLLEGE EDUCATION</h5>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width: 30%;">NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width: 30%;">DEGREE</th>
                    <th style="width: 30%;">INCLUSIVE YEARS</th>
                    <th style="width: 10%;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" id="sample1" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="sample1" class="formlabel form-label"><span class="span_college_name span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="text" id="sample2" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="sample2" class="formlabel form-label"><span class="span_college_degree span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" id="sample3" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="sample3" class="formlabel form-label"><span class="span_college_inclusive_years span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <button type="button" id="sampleAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- Save Table --}}
        <table id="sample_table" class="table table-bordered table-striped table-hover align-middle">
            <thead>
                <tr style="display: none;" class="sample_table_thead">
                    <th style="width: 30%;">NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width: 30%;">DEGREE</th>
                    <th style="width: 30%;">INCLUSIVE YEARS</th>
                    <th style="width: 10%;">ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        {{-- Update Table --}}
        <table id="sample_table_orig" class="table table-bordered table-striped table-hover align-middle sample_table_orig" style="display: none;">
            <thead>
                <tr>
                    <th style="width: 30%;">NAME OF UNIVERSITY/COLLEGE</th>
                    <th style="width: 30%;">DEGREE</th>
                    <th style="width: 30%;">INCLUSIVE YEARS</th>
                    <th style="width: 10%;">ACTION</th>
                </tr>
            </thead>
            <tbody id="sample_table_orig_tbody"></tbody>
        </table>

        <button type="button" id="btnSaveLogs">SAVE</button>

<script>
    $('#sampleAdd').click(function(){
        var sample1 = $('#sample1').val();
        var sample2 = $('#sample2').val();
        var sample3 = $('#sample3').val();

        if($('#btnSaveLogs').is(":visible")){
            var sample_table = "<tr class='sample_tr'>"+
                                    "<td class='td_1 text-capitalize' style='width:30%;'>" + sample1 + "</td>" +
                                    "<td class='td_2' style='width:30%;'>" + sample2 + "</td>" +
                                    "<td class='td_3' style='width:30%;'>" + sample3 + "</td>" +
                                    "<td style='width:10%;'> <button class='btn btn-danger btn_sample center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>"+
                                "<tr>";
            $('#sample_table tbody').append(sample_table);
        }
        else{
            var sample_table = "<tr class='sample_tr'>"+
                                    "<td class='td_1 text-capitalize' style='width:30%;'>" + sample1 + "</td>" +
                                    "<td class='td_2' style='width:30%;'>" + sample2 + "</td>" +
                                    "<td class='td_3' style='width:30%;'>" + sample3 + "</td>" +
                                    "<td style='width:10%;'> <button class='btn btn-danger btn_sample center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>"+
                                "<tr>";
            $('#sample_table_orig_tbody').append(sample_table);
            $('#sample_table_orig').show();
        }

        $('#sample1').val("");
        $('#sample2').val("");
        $('#sample3').val("");

        $('.btn_sample').click(function(){
            $(this).parent().parent().remove();
        });
    });

    $('#btnSaveLogs').on('click',function(){
    var fName = $('#fName').val();
    var mName = $('#mName').val();
    var lName = $('#lName').val();

    console.log(fName);
    console.log(mName);
    console.log(lName);
    $.ajax({
        url:"/employees/saveLogs",
        type:"POST",
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            fName:fName,
            mName:mName,
            lName:lName
        },
        success: function(data){
            if(data.result == 'true'){

                $('.sample_tr').each(function(){
                    $.ajax({
                        type: 'POST',
                        url: '/employees/saveSample',
                        async: false,
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:{
                            employee_id : data.id,
                            sample1 : $(this).children('.td_1').html(),
                            sample2: $(this).children('.td_2').html(),
                            sample3  : $(this).children('.td_3').html()
                        },
                    });
                });

                console.log('success');
            }
            else{
                console.log('failed');
            }
        }
    });
    });
</script>
@endsection