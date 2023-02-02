@extends('layouts.app')

@section('content')
<br>

<div class="row mb-3">
    <div class="col">
        <div class="f-outline">
            <select class="form-select forminput form-control" data-placeholder="Choose Company"  id="sample_company" placeholder=" " style="background-color:white;" multiple>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->company_name}}</option>
                    @endforeach
            </select>
            <label for="sample_company" class="formlabel form-label"><i class="fa-solid fa-building"></i> COMPANY <span class="span_employee_company span_all"></span></label>
        </div>
    </div>
</div>

<button type="button" class="btn-success" id="saveChosen">SAVE</button>
<script>
    $('#loading').hide();
    $('#sample_company').chosen();

    // $(document).ready(function() {
        
    //     $('#saveChosen').on('click',function(){
    //         var sample_company = $(this).val();
    //         alert("Selected values: " + sample_company.join(", "));
    //         // $.ajax({
    //         //     url: "/saveChosen",
    //         //     method: "POST",
    //         //     headers:{
    //         //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         //     },
    //         //     data: {sample_company: sample_company},
    //         //     success: function(result) {
    //         //         console.log(result);
    //         //     }
    //         // });
    //     });
    // });

    $("#saveChosen").click(function(){
        var sample_company = $('#sample_company').val();
        alert("Selected values: " + sample_company.toString());

        $.ajax({
            url: "/saveChosen",
            method: "POST",
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                sample_company: sample_company
            },
            success: function(result) {
                console.log(result);
            }
        });
    });
</script>
@endsection